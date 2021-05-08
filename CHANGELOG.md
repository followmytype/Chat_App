# CHANGE LOG

## Version 0.0.2 / 2021-05-08
### `Frontend Page & JS`
* 使用者註冊上傳圖片改成選擇圖片，目前階段先不考慮讓使用者上傳自己的圖片
---
## Version 0.0.2 / 2021-05-07
### `Frontend Page & JS`
* 前端頁面一些`js`效果以及`form`表單的`input type`修改
    1. `html`的部分引用新增的`js`檔，也修改一些`input type`
    2. 新增兩個`js`檔案，一個是顯示隱藏密碼的`icon`功能，另一個是使用者頁面的搜尋框動畫，主要都是在做`class`的新增刪除，或是`input type`的轉換
    3. 修改`css`，值得注意的是，`edge`瀏覽器的密碼輸入欄有預設的顯示隱藏密碼按鈕，但因為我們有自己做的功能，也為了服務其他瀏覽器，所以在`css`檔案裡增加隱藏預設按鈕的`code`
        ```css
        /* 消除原生的密碼顯示按鈕 */
        .form form .input input::-ms-reveal,
        .form form .input input::-ms-clear {
            display: none;
        }
        ```
---
## Version 0.0.2 / 2021-05-06
### `Frontend Page down`
* 前端頁面完成
    * 使用者頁面 - `users.html`
    * 聊天室頁面 - `chat.html`
    * 版面樣式 - `css/style.css`
---
## Version 0.0.1 / 2021-05-05
### `Initial project`
1. 專案建立
2. 基本頁面、樣式建立
    * 入口頁（註冊）- `index.html`
    * 登入頁 - `login.html`
    * 使用者頁面 - `users.html`
    * 版面樣式 - `css/style.css`