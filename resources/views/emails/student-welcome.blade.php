<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .credentials {
            background: white;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue {{ $student->nom_fr }} {{ $student->prenom_fr }} !</h1>
        <p>Votre compte a été créé avec succès</p>
    </div>
    
    <div class="content">
        <p>Bonjour <strong>{{ $student->nom_fr }} {{ $student->prenom_fr }}</strong>,</p>
        
        <p>Nous sommes ravis de vous accueillir sur notre plateforme éducative. Votre compte a été créé avec succès.</p>
        
        <div class="credentials">
            <h3>🔐 Vos identifiants de connexion :</h3>
            <p><strong>Email :</strong> {{ $student->email }}</p>
            <p><strong>Mot de passe temporaire :</strong> {{ $password }}</p>
        </div>
        
        <p>Pour accéder à votre espace, cliquez sur le bouton ci-dessous :</p>
        
        <a href="{{ $loginUrl }}" class="button">📚 Accéder à la plateforme</a>
        
        <p><strong>⚠️ Important :</strong> Pour des raisons de sécurité, nous vous recommandons fortement de :</p>
        <ol>
            <li>Changer votre mot de passe après votre première connexion</li>
            <li>Ne jamais partager vos identifiants</li>
            <li>Utiliser un mot de passe fort et unique</li>
        </ol>
        
        <p>Si vous rencontrez des difficultés pour vous connecter, n'hésitez pas à nous contacter.</p>
        
        <p>Bien cordialement,<br>
        <strong>L'équipe pédagogique</strong></p>
    </div>
    
    <div class="footer">
        <p>Cet email a été envoyé automatiquement. Merci de ne pas y répondre.</p>
        <p>© {{ date('Y') }} ClassyAcademy. Tous droits réservés.</p>
    </div>
</body>
</html>