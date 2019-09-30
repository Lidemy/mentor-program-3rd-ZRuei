## Bootstrap 是什麼？

Bootstrap 是由 twitter 所開發的開源前端函式庫，包含 HTML、CSS 及 JavaScript 等內容，其提供的設計模式從字體、表單、按鈕、導航等各式元件及 Javascript 擴充套件，便於網頁開發與應用、兼容跨瀏覽器、響應式設計等。

## 請簡介網格系統以及與 RWD 的關係

網格系統是一種排版方法，響應式設計 （Responsive web design, RWD）為此種方法之應用。

網格系統將視覺版面切分成等分的柵狀空間，在有規劃的網狀格局之內擺放圖文位置，用來編排圖片及文字，以形成有秩序及邏輯的版面設計。近年，網頁設計也導入網格系統，普遍為切分成 12 等分的柵狀格線，依照不同裝置的螢幕尺寸，編排適合的呈現，這種適應跨裝置的設計又稱為響應式設計。

## 請找出任何一個與 Bootstrap 類似的 library

#### Materialize

基於 google 的設計準則 Material Design 所產生的 CSS library。 使用方法相當簡便，可以下載原始檔引入，或直接使用 CDN。

###### 範例如下：

``` html=
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
```

## jQuery 是什麼？

jQuery 是一個以 JavaScript 所編寫的函式庫。它所提供的 API 語法簡潔且相容於許多瀏覽器，易於使用是最大特點，像是 DOM 操作、事件處理、動畫及 AJAX 操作等，都有相對原生 JavaScript 更簡易的語法。

## jQuery 與 vanilla JS 的關係是什麼？

jQuery 是基於 JavaScript 所撰寫的函式庫，vanilla JS 即為原生 JavaScript。
