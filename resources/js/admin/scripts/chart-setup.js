$(function () {
  if($('#sales').length) {
    var saleChart = $('#sales');
    load_sales_chart(saleChart);
  }

  if($('#books').length) {
    var bookChart = $('#books');
    var books = bookChart.data("books");

    load_books_chart(bookChart, books);
  }

  if($('#users').length) {
    var userChart = $('#users');
    var admins = userChart.data("admins");
    var customers = userChart.data("customers");

    load_users_chart(userChart, admins, customers);
  }

  function load_sales_chart(saleChart) {
    new Chart(saleChart, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Overall Sales Yearly',
          data: [15, 25.5, 60, 50, 40],
          backgroundColor: '#515570',
          fill: false
        }]
      }
    });
  }

  function load_books_chart(bookChart, books) {
    var labels = [];
    var sold = [];

    books.forEach(function(book) {
      labels.push(book.title);
      sold.push(book.sold);
    });

    console.log(sold);

    new Chart(bookChart, {
      type: 'bar',
      data: {
        labels: labels,  
        datasets: [{
          label: 'Top 5 Best-Selling Books',
          data: sold,
          backgroundColor: [
          '#515570',
          '#2f2b35',
          '#2f2b35',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderWidth: 0.5
        }]
      }
    });
  }

  function load_users_chart(userChart, admins, customers) {
    console.log(admins)
    new Chart(userChart, {
      type: 'doughnut',
      data: {
        labels: ['Admins', 'Customers'],
        datasets: [{
          data: [admins, customers],
          backgroundColor: [
          '#515570',
          '#2f2b35'
          ]
        }]
      }
    });
  }
});