<?php
    /**
 * Package Pays
 * Version 1.0.0
 */
/*
Plugin name: Pays
Plugin uri: https://github.com/e0958030
Version: 1.0.0
Description: Afficher des pays correspondant à la catégorie "pays"
*/
function cam_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook

$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
wp_enqueue_style(   'em_plugin_pays_css',
                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);

wp_enqueue_script(  'em_plugin_pays_js',
                    plugin_dir_url(__FILE__) ."js/pays.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'cam_enqueue');
/* Création de la liste des destinations en HTML */
function creer_bouton(){
    $categories = get_categories();
    $contenu = '';
        foreach ($categories as $category) {
            $nom = $category->name;
            $id = $category->term_id;
            $contenu .= '<button id="cat_'.$id.'" class="lien__categorie">'.$nom.'</button>';
        }
        return $contenu;
}

function creation_destinations(){
    $contenu = creer_bouton() . '<div class="contenu__restapi"></div>';
    // '<button id="cat_3" class="lien__categorie">Aventure</button> 
    // <button id="cat_4" class="lien__categorie">Zen</button>    
    return $contenu;
}

add_shortcode('cam_pays', 'creer_pays');
?>