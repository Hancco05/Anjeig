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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: center;
            justify-content: center;
            align-items: center;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header img.logo {
            width: 25%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        .contact-section {
            padding: 50px 15px;
        }

        .contact-form {
            background-color: #282828;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-form label {
            color: #ffffff;
        }

        .contact-form .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .contact-form .btn-primary:hover {
            background-color: #45A049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        .mensaje {
            margin-top: 20px;
            font-size: 1rem;
        }

        .mensaje .exito {
            color: #4CAF50;
        }

        .mensaje .error {
            color: #FF5252;
        }
        .container {
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
            width: 60%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        textarea {
            height: 150px;
        }

        .form-group.error input, .form-group.error textarea {
            border-color: red;
        }

        .form-group.error .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
<header>
    <img src="img/logo.png" alt="Logo Anjeig" class="logo">
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="description.html">Descripción</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Formulario de Contacto</h2>
        <form id="contactForm" action="mailto:ejemplo@dominio.com" method="post" enctype="text/plain">
            <div class="form-group" id="name-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required>
            </div>

            <div class="form-group" id="email-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo" required>
            </div>

            <div class="form-group" id="subject-group">
                <label for="subject">Asunto:</label>
                <input type="text" id="subject" name="subject" placeholder="Asunto" required>
            </div>

            <div class="form-group" id="message-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" placeholder="Escribe tu mensaje" required></textarea>
            </div>

            <input type="submit" value="Enviar Mensaje">
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#contactForm').submit(function(event) {
            event.preventDefault(); // Evitar que se recargue la página

            const formData = new FormData(this);

            fetch('enviar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                const messageDiv = $('#responseMessage');
                messageDiv.show();
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
