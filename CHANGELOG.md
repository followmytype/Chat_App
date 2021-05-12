# CHANGE LOG

## Version 0.1.1 / 2021-05-09
### `Chat history part 1`
* 當初的聊天室邏輯為只取雙方最新的十筆紀錄，一旦雙方當前的聊天訊息超過十筆，就沒辦法往前看，所以改成前端在發送`api`時給予最後一筆訊息的`id`，而後端只需要回傳最後一筆`id`後的訊息，前端再把他`append`到頁面上，就能實現當前雙方不停聊天時，還能往前看聊天記錄的功能。而往前找尋更以前的聊天記錄以後再做
---
## Version 0.1.0 / 2021-05-09
### `Log out completed`
* 登出完成，主要在User物件新建更改狀態的方法，然後在登入的時候改成`true`登出時則為`false`，另外新增`logout.php`，作為消除`session`以及登出後跳轉登入畫面
---
## Version 0.0.9 / 2021-05-09
### `Show last message`
* 使用者列表顯示對話最後一則訊息
    2. `php/classes/Message.php` - 新增取得雙方對話的最後一則訊息，若無則回傳空字串
    1. `php/dealUserList.php` - 當在迭代使用者列表時，搜尋雙方的最後一則訊息，處理並顯示
---
## Version 0.0.8 / 2021-05-10
### `Chat completed`
* `Message`物件建立，有傳送訊息跟拿取雙方對話內容的兩個方法 - `php/classes/Message.php`
* 聊天功能完成
    1. `chat.php` - 將頁面改成動態，會更新對話窗內的訊息，傳送訊息的表單內帶有隱藏的寄送者`id`跟接收者`id`
    3. `send-chat.php` - 後端處理訊息發送
    4. `get-chat.php` - 後端提供雙方對話內容
    2. `chat.js` - 發送`POST`給後端傳送訊息，每`0.5`秒查詢訊息更新內容
* `FormValidate.php`增加驗證傳送訊息
* 新增`message`資料表 - `sql/database.php`
---
## Version 0.0.6 / 2021-05-09
### `Move file position`
* 發現php檔案越來越多了，把一些類別檔案歸類到classes目錄裡面
    1. `php/Users.php` -> `php/classes/Users.php`
    2. `php/DBLink.php` -> `php/classes/DBLink.php`
    3. `php/FormValidate.php` -> `php/classes/FormValidate.php`
---
## Version 0.0.6 / 2021-05-09
### `User Page & search completed`
* `User`物件功能新增 - `php/User.php`
    1. 用`user_id`取得使用者資訊
    2. 拿取所有使用者資料
    3. 搜尋使用者方法
    4. 將`fetch`和`fetchAll`獨立成方法出來，在其他的方法中可以重複使用
* 使用者頁面完成 - `users.php`
* 後端產生使用者列表完成 - `php/userList.php`
* 後端搜尋功能和產生使用者料表完成 - `php/search.php`
    1. `php/userList.php` - 回傳所有使用者資訊
    2. `php/search.php` - 回傳搜尋使用者暱稱
    3. `php/dealUserList.php` - 因為上面的兩個檔案最後都會回傳同樣格式的輸出，所以新增一個可以重複使用的檔案
* 前端搜尋取的使用者列表功能完成 - `javascript/users.js`
    * 每`0.5`秒向後端拿取並更新所有使用者資訊
* `AJAX`小修改，發送請求使用非同步
    1. `javascript/login.js`
    2. `javascript/signup.js`
---
## Version 0.0.5 / 2021-05-09
### `Login completed`
* 後端登入功能完成 - `php/login.php`
    * 使用者登入完成，簡單判斷`email`跟`password`是否相符就讓他登入
    * 使用`session`的方式紀錄
* 前端註冊功能完成 - `javascript/login.js`
    * 當收到`ajax`的回傳成功訊息，跳轉到使用者頁面(`users.php`)
---
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