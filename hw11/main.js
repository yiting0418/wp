import {sqlFetch} from '../lib/sql.js' //import sqlFetch function

export var R = {}
let _id=0, _title=1, _body=2

window.onhashchange = async function () {
  var r
  var tokens = window.location.hash.split('/')
  console.log('tokens=', tokens)
  switch (tokens[0]) {
    case '#show':
      let r = await sqlFetch('blog', `SELECT id, title, body FROM posts WHERE id=${tokens[1]}`)
      R.show(r[0]) // 取得第一筆傳入 (雖然只會有一筆，但 SELECT 預設會傳回很多比，所以用 results[0] 只取第一筆)
      break
    case '#new':
      R.new() //顯示新的貼文
      break
    default:
      let posts = await sqlFetch('blog', `SELECT id, title, body FROM posts`)
      R.list(posts) //根據目前雜湊片段更新頁面內容
      break
  }
} 

window.onload = async function () {
  //如果資料表不存在，建立資料表
  await sqlFetch('blog', `CREATE TABLE IF NOT EXISTS posts (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, body TEXT)`)
  window.onhashchange() //更新頁面內容
} 

R.layout = function (title, content) {
  document.querySelector('title').innerText = title //set title
  document.querySelector('#content').innerHTML = content //set content
}

R.list = function (posts) {
  let list = []
  for (let post of posts) {
    list.push(`
    <li>
      <h2>${post[_title]}</h2>
      <p><a id="show${post[_id]}" href="#show/${post[_id]}">Read post</a></p>
    </li>
    `) //顯示貼文標題及read post連結
  }
  let content = `
  <h1>Posts</h1>
  <p>You have <strong>${posts.length}</strong> posts!</p>
  <p><a id="createPost" href="#new">Create a Post</a></p>
  <ul id="posts">
    ${list.join('\n')}
  </ul>
  `
  return R.layout('Posts', content)
} //posts.length 計算貼文數量 //createPost導向#new創建貼文

R.new = function () {
  R.layout('New Post', `
  <h1>New Post</h1>
  <p>Create a new post.</p>
  <form>
    <p><input id="title" type="text" placeholder="Title" name="title"></p>
    <p><textarea id="body" placeholder="Contents" name="body"></textarea></p>
    <p><input id="savePost" type="button" value="Create"></p>
  </form>
  `)
  document.querySelector('#savePost').onclick = ()=>R.savePost()
} //input標題和內容建立新貼文 //Create button觸發savePost儲存貼文

R.show = function (post) {
  return R.layout(post[_title], `
    <h1>${post[_title]}</h1>
    <p>${post[_body]}</p>
  `)
} //顯示貼文標題及內容

R.savePost = async function () {
  let title = document.querySelector('#title').value
  let body = document.querySelector('#body').value
  await sqlFetch('blog', `INSERT INTO posts (title, body) VALUES ('${title}', '${body}')`)
  window.location.hash = '#list'
} //使用sqlFetch將新貼文儲存到資料庫。
