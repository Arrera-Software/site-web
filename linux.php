<?php
    session_start();

// Débogage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérification du fichier .env
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    error_log("Fichier .env introuvable dans : " . $envFile);
} else {
    $config = parse_ini_file($envFile);
    error_log("Configuration SMTP trouvée : " . (isset($config['SMTP_PASSWORD']) ? 'Oui' : 'Non'));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrera Linux</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/linux.css">
    <link rel="icon" href="img/arrera-linux.webp">
</head>
<body>
     <?php include 'header-footer/header.php'; 

    $btnFile= 'scripts/script_link_btn.php';
    if (!file_exists($btnFile)) {
        die('Fichier de configuration introuvable.');
    }
    require_once $btnFile;

    $configFile = 'config.php';
    if (!file_exists($configFile)) {
        die('Fichier de configuration introuvable.');
    }
    require_once $configFile;

    ?>
    <main>
        <div class="presentation-section">
            <img src="img/baniere2026-linux.webp" alt="Logo Linux" class="banner-linux">
            <div class="presentation-text">
                <h1>Arrera Linux</h1>
                <h3>Quesque est Arrera Linux ?</h3>
                <p>Arrera Linux est un esemble de script bash qui est a voir comme un boite a outil pour installer des packet et gerer votre distribution linux installer</p>
                <h3>Quelle sont les script d'Arrera Linux ?</h3>
                <p>Le script que propose Arrera Linux pour le moment est un script d'update de votre systeme et au flatpack nommer Arrera Update (Fonctionne sur base debian et base redhat).</p>
                <p>Le deuxieme script est un script qui permet de parametrer vos linux (Base redhat)</p>
            </div>
        </div>

        <div class="ligne"></div>

        <section class="scripts">
            <div class="presentation-script">
                <h1>Arrera Update</h1>
                <h2>Description : </h2><p>Script qui permet de mettre a jour votre distribution Linux au complet. Ce qui veux dire mise a jour systeme et flatpack</p>
                <div class="system-compatibility">
                    <h3>Distributions compatibles :</h3>
                    <div class="distro-logos">
                        <div class="distro-logo logo-fedora" title="Fedora"></div>
                        <div class="distro-logo logo-redhat" title="Red Hat"></div>
                        <div class="distro-logo logo-centos" title="CentOS"></div>
                        <div class="distro-logo logo-debian" title="Debian"></div>
                        <div class="distro-logo logo-mint" title="Linux Mint"></div>
                        <div class="distro-logo logo-ubuntu" title="Ubuntu"></div>
                        <div class="distro-logo logo-popos" title="Pop!_OS"></div>
                    </div>
                </div>
                <a href="" class="view_depos">Voir le depots</a>
            </div>
            
            <div class="presentation-script">
                <h1>Arrera Configurator Redhat Base</h1>
                <h2>Description : </h2><p>Script qui permet de faire tout la configuartion de votre systeme Redhat, fedora ou centos. Ce qui vous permet de cree des template pour deployer des systeme en une seul commande</p>
                <div class ="system-compatibility">
                    <h3>Distributions compatibles :</h3>
                    <div class="distro-logos">
                        <div class="distro-logo logo-fedora" title="Fedora"></div>
                        <div class="distro-logo logo-redhat" title="Red Hat"></div>
                        <div class="distro-logo logo-centos" title="CentOS"></div>
                    </div>
                </div>
                <a href="" class="view_depos">Voir le depots</a>
            </div>
    
            <div class="presentation-script">
                <h1>Arrera Configurator Debian Base</h1>
                <h2>Description : </h2><p>Script qui permet de faire tout la configuartion de votre systeme Debian, Linux Mint, Ubuntu ou Pop!_OS. Ce qui vous permet de cree des template pour deployer des systeme en une seul commande</p>
                <div class ="system-compatibility">
                    <h3>Distributions compatibles :</h3>
                    <div class="distro-logos">
                        <div class="distro-logo logo-mint" title="Linux Mint"></div>
                        <div class="distro-logo logo-ubuntu" title="Ubuntu"></div>
                        <div class="distro-logo logo-popos" title="Pop!_OS"></div>
                    </div>
                </div>
                <a href="" class="view_depos">Voir le depots</a>
            </div>

            <div class="presentation-script">
                <h1>Arrera Configurator Alpine Base</h1>
                <h2>Description : </h2><p>Script qui permet de faire tout la configuartion de votre systeme Alpine Linux. Ce qui vous permet de cree des template pour deployer des systeme en une seul commande</p>
                <div class ="system-compatibility">
                    <h3>Distributions compatibles :</h3>
                    <div class="distro-logos">
                        <div class="distro-logo logo-alpine" title="Alpine Linux"></div>
                    </div>
                </div>
                <a href="" class="view_depos">Voir le depots</a>
            </div>

        
            <!--
            <div class="presentation-script">
                <h1></h1>
                <h2>Description : </h2><p></p>
                <div class ="system-compatibility">
                    <h3>Distributions compatibles :</h3>
                    <div class="distro-logos"></div>
                </div>
                <a href="" class="view_depos">Voir le depots</a>
            </div>
            -->
        </section>
        
    </main>
    <?php include 'header-footer/footer.php'; ?>
</body>
</html>