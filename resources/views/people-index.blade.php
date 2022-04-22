<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search names app</title>
  <style>
    html {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      font-size: 16px;
    }

    html,
    body {
      margin: 0;
      padding: 0;
    }

    *, :after, :before {
      box-sizing: border-box;
    }

    .container {
      width: 600px;
      max-width: 100%;
      margin: 20px auto;
    }

    .input-container {
      margin-bottom: 10px;
    }

    .input-container > label {
      display: block;
    }

    button {
      padding: 12px;
      color: white;
      background-color: #2085C1;
      border: none;
      border-radius: 3px;
    }

    #results-table {
      margin-top: 40px;
      border-collapse: collapse;
      width: 100%;
      text-align: left;
    }

    td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    thead td {
      padding-top: 10px;
      padding-bottom: 10px;
      background-color: #2085C1;
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="container">
  <form id="search-form">
    <div class="input-container">
      <label for="search">Search</label>
      <input id="search" type="text" name="search">
    </div>
    <div class="input-container">
      <div>
        <input id="dupes" type="checkbox" name="dupes" value="true">
        <label for="dupes">Include duplicates?</label>
      </div>
    </div>
    <div class="input-container">
      <button>Search</button>
    </div>
  </form>

  <div id="results">
    <table id="results-table">
      <thead>
      <tr>
        <td>Surname</td>
        <td>First name</td>
      </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>

<script>
  const form = document.getElementById('search-form');
  const resultsTable = document.querySelector('#results-table > tbody');

  //form submit handler
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    fetch(`people/search?terms=${formData.get('search')}&dupes=${formData.get('dupes')}`)
      .then(response => response.json())
      .then(data => {

        //clear results table body of any rows
        while (resultsTable.firstChild) {
          resultsTable.removeChild(resultsTable.lastChild);
        }

        //create new table rows for each name and append to table
        data.forEach(d => {
          let row = document.createElement('tr')
          let surnameCell = document.createElement('td');
          surnameCell.textContent = d.surname;
          row.appendChild(surnameCell);
          let firstnameCell = document.createElement('td');
          firstnameCell.textContent = d.first_name;
          row.appendChild(firstnameCell);
          resultsTable.appendChild(row);
        })
      })
  })
</script>
</body>
</html>
