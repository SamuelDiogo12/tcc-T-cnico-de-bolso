function myFunction() {
	var x = document.getElementById("Demo");
	if (x.className.indexOf("w3-show") == -1) { 
	  x.className += " w3-show";
	} else {
	  x.className = x.className.replace(" w3-show", "");
	}
  }

  function calcularNC(v1, v2, ctc, f, prnt) {
    // Aqui você pode colocar a lógica do cálculo que deseja realizar.
    // Como exemplo, estou fazendo um cálculo fictício.
    const resultado = ((v2 - v1) * ctc * f) / (prnt *10);
    return resultado.toFixed(2);
}

function btncalcular() {
    const v1 = document.getElementById('v1').value;
    const v2 = document.getElementById('v2').value;
    const ctc = document.getElementById('ctc').value;
    const f = document.getElementById('f').value;
    const prnt = document.getElementById('prnt').value;
    const resultado = document.getElementById('lblResultado');
    resultado.innerHTML = 'Resultado: ' + calcularNC(v1, v2, ctc, f, prnt)+' toneladas de calcário por hectare';
}


function fetchNews() {
  fetch('https://www.cepea.esalq.usp.br/rss.php')
    .then(response => response.text())
    .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
    .then(data => {
      const items = data.querySelectorAll("item");
      let html = "";
      let slideGroup = [];
      
      items.forEach((el, index) => {
        if (index % 3 === 0 && index !== 0) {
          html += `<div class="slide">${slideGroup.join('')}</div>`;
          slideGroup = [];
        }
        slideGroup.push(`
          <a style="text-decoration:none;" href="${el.querySelector("link").textContent}">
            <div class="yy">
              <h2>${el.querySelector("title").textContent}</h2>
              <p>${el.querySelector("description").textContent}</p>
            </div>
          </a>
        `);
      });

      if (slideGroup.length > 0) {
        html += `<div class="slide">${slideGroup.join('')}</div>`;
      }

      document.getElementById('noticia').innerHTML = html;

      // Slideshow functionality
      let slideIndex = 0;
      const slides = document.querySelectorAll('.slide');
      if (slides.length > 0) {
        slides[slideIndex].classList.add('active');

        setInterval(() => {
          slides[slideIndex].classList.remove('active');
          slideIndex = (slideIndex + 1) % slides.length;
          slides[slideIndex].classList.add('active');
        }, 10000); // Change slide every 5 seconds
      }
    });
}

document.addEventListener("DOMContentLoaded", fetchNews);
