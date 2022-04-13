import 'bootstrap-5.1.3-dist/bootstrap.min.js';

var scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#navbar-example'
  })

  var dataSpyList = [].slice.call(document.querySelectorAll('[data-bs-spy="scroll"]'))
  dataSpyList.forEach(function (dataSpyEl) {
    bootstrap.ScrollSpy.getInstance(dataSpyEl)
      .refresh()
  })