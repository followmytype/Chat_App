# CHANGE LOG

## Version 0.0.4 / 2021-05-09
### `Register completed`
* 使用者物件建立 - `php/Users.php`
    * 裡面主要功能有新增使用者和拿取使用者資訊，註冊時利用它來檢查`Email`和新增使用者
* 後端註冊功能完成 - `php/register.php`
    * 使用者註冊完畢自動登入
    * 使用`session`的方式紀錄，原本想用`token`的方式，作為未來改進方向
* 前端註冊功能完成 - `javascript/signup.js`
    * 當收到`ajax`的回傳成功訊息，跳轉到使用者頁面(`users.php`)
* 使用`session`作為記錄登入狀態的方式
    * 因為使用`session`，所以原先的`html`檔都轉換成`php`檔，以便判斷當前的登入狀態
        1. `index.html -> index.php`
        2. `login.html -> login.php`
        3. `users.html -> users.php`
        4. `chat.html -> chat.php`
    * 另外新增`header.php`檔案，因為原先的html檔頭都一樣，簡化成使用同一份檔頭
---
## Version 0.0.3 / 2021-05-08
### `Database and table build & Signup AJAX & Form Validate`
* 資料庫建立 - `sql/database.sql`
    * 使用者資料表建立
* 資料庫連結程式 - `php/DBLink.php`
    * 建立連結資料庫的程式
    * 使用裡面的`connect()`就能得到使用`PDO`的物件回傳
* 表單驗證程式 - `php/FormValidate.php`
    * 建立驗證註冊登入的物件，把資料以及表單型態放進去，就能得到轉換後的資料和錯誤訊息
* 新增註冊程式 - `php/register.php`
    * 目前還沒做完，只有做輸入驗證
* 新增註冊的`AJAX`檔案 - `javascript/signup.js`
    * 發送`POST`給`php/register.php`
* 一些樣式修改 - `css/style.css`
    * 錯誤訊息樣式修改
---
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