function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}

async function getTerm() {
    const response = await fetch("http://localhost/google_login/studi.php");
    const movies = await response.text();
    console.log(movies);
  }
  

// function getTerm() {
//   fetch("http://localhost/google_login/studi.php")
//     .then(function (response) {
//       return response.text();
//       //✅data types:
//       //1. json
//       //2. text
//       //3. blob
//     })
//     .then(function (result) {
//       //✅when promise is returned succesfully, response.data is logged inside result variable
//       console.log(result);
//     })
//     .catch(function (error) {
//       //✅when promise is failed
//       console.log(error);
//     });

//   //   var xhttp = new XMLHttpRequest();
//   //   xhttp.onreadystatechange = function () {
//   //     if (this.readyState == 4 && this.status == 200) {
//   //       document.getElementById("demo").innerHTML = this.responseText;
//   //     }
//   //   };
//   //   xhttp.open("POST", "studi.php", true);
//   //   xhttp.send();
// }

function khsTermChange() {
  var x = document.getElementById("khsTerm").value;
  console.log(x);
}

function krsTermChange() {
  var x = document.getElementById("krsTerm").value;
  console.log(x);
}
