<!DOCTYPE html>
<html>
<body>

<style>
  #header {
    position: running(header);
  }

  #footer {
    position: running(footer);
  }

  @page {
    @top-center {
      content: element(header);
    }

    @bottom-center {
      content: element(footer);
    }
  }

  #current-page-placeholder::before {
    content: counter(page);
  }


  #total-pages-placeholder::before {
    content: counter(pages);
  }
</style>

<div id="header"><p style="color: green">This is a header</p></div>
<div id="footer"><p style="color: red">This is a footer. Page <span id="current-page-placeholder"></span>/<span id="total-pages-placeholder"></span></p></div>

<h2>An ordered HTML list</h2>

<ol>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<ol type="1">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<ol type="A">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<ol type="a">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<ol type="I">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<ol type="i">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

</body>
</html>