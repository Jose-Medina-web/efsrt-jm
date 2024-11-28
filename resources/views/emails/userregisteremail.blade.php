<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciales de Acceso a EFRST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Credenciales de Acceso a EFRST</h1>
        </div>
        <div class="content">
            <p>Estimado/a,</p>
            <p>Se le brinda las credenciales a EFRST:</p>
            <table style="width: 100%; border-collapse: collapse; margin: 10px 0;">
                <tr>
                    <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Correo electrónico:</td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ ($user->email) }}}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Contraseña</td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $user->password }}</td>
                </tr>
            </table>
            <p>Agradecemos su atención y le invitamos a ponerse en contacto si requiere mayor información.</p>
            <p>Atentamente,</p>
            <p><strong>Equipo de Coordinación</strong></p>
        </div>
        <div class="footer">
            Este es un mensaje generado automáticamente. Por favor, no responda a este correo.
        </div>
    </div>
</body>
</html>
