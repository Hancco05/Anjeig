<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Aquí puedes agregar la lógica para enviar el correo o guardar los datos en una base de datos

    echo "Gracias, $nombre. Tu mensaje ha sido enviado.";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Mi Página Web</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="description.html">Descripción</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="row contact-section py-5 bg-dark text-white">
      <div class="col-md-12 text-center">
        <h2>Formulario de Contacto</h2>
      </div>
      <div class="col-md-6 offset-md-3">
        <form id="contactForm" class="contact-form p-4 bg-dark text-white rounded">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="asunto" class="form-label">Asunto</label>
            <input type="text" id="asunto" name="asunto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="4" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
        <div class="mensaje" id="responseMessage"></div>
      </div>
    </section>
    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#contactForm').submit(function(event) {
        event.preventDefault(); // Evitar que se recargue la página

        // Crear un objeto FormData
        const formData = new FormData(this);

        // Enviar los datos usando fetch API
        fetch('enviar.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          const messageDiv = $('#responseMessage');
          messageDiv.show();

          // Mostrar el mensaje de respuesta
          messageDiv.html(data.includes('éxito') ? 
            `<span class="exito">${data}</span>` : 
            `<span class="error">${data}</span>`);
        })
        .catch(error => {
          const messageDiv = $('#responseMessage');
          messageDiv.show();
          messageDiv.html(`<span class="error">Error al enviar: ${error}</span>`);
        });
      });
    });
  </script>
    <footer>
        <p>© 2024 Mi Página Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>