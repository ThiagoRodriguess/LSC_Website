<?php
/**
 * Kadence functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kadence
 */

define( 'KADENCE_VERSION', '1.2.14' );
define( 'KADENCE_MINIMUM_WP_VERSION', '6.0' );
define( 'KADENCE_MINIMUM_PHP_VERSION', '7.4' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], KADENCE_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), KADENCE_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Load the `kadence()` entry point function.
require get_template_directory() . '/inc/class-theme.php';

// Load the `kadence()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'Kadence\kadence' );

// função que libera o upload de qualquer tipo de arquivo para a biblioteca
// importante para o upload de csv's e tsv's
function allow_json_mime($mimes) {
$mimes['json'] = 'application/json';
return $mimes;
}
add_filter('upload_mimes', 'allow_json_mime');
define( 'ALLOW_UNFILTERED_UPLOADS', true );

// FUNÇÕES QUE ALTERAM PAGINAS
// Função que printa os dados dos professors na página TEAM
function print_professor($info) {
    echo "
        <div class='card card_professor'>
            <div class='teste'>
                <div class='card_infos'>
                    <h3 class='card_nome'> ".$info["Nome"]."</h3>";
                        echo "<p class='orient posicao'>".$info["Posicao"]."</p>
                    <div class='card_image'>";
                    if ($info["Foto"]) {
                        echo "<img src='".$info["Foto"]."' alt='Profile picture'>";
                    } else {
                        echo "<img src='https://lsc.ic.unicamp.br/wp-content/uploads/2024/10/std_prof.png' alt='Profile picture'>";
                    }
                    
            echo "
                    </div>
                </div>
                <div class='card_social'>
                <ul>";
                if ($info["Site pessoal"]) {echo "
                    <li class='site_pessoal'>
                        <a href='".$info["Site pessoal"]."' target='_blank' rel='noopener noreferrer'>
                            <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M12.158,12.786L9.46,20.625c0.806,0.237,1.657,0.366,2.54,0.366c1.047,0,2.051-0.181,2.986-0.51 c-0.024-0.038-0.046-0.079-0.065-0.124L12.158,12.786z M3.009,12c0,3.559,2.068,6.634,5.067,8.092L3.788,8.341 C3.289,9.459,3.009,10.696,3.009,12z M18.069,11.546c0-1.112-0.399-1.881-0.741-2.48c-0.456-0.741-0.883-1.368-0.883-2.109 c0-0.826,0.627-1.596,1.51-1.596c0.04,0,0.078,0.005,0.116,0.007C16.472,3.904,14.34,3.009,12,3.009 c-3.141,0-5.904,1.612-7.512,4.052c0.211,0.007,0.41,0.011,0.579,0.011c0.94,0,2.396-0.114,2.396-0.114 C7.947,6.93,8.004,7.642,7.52,7.699c0,0-0.487,0.057-1.029,0.085l3.274,9.739l1.968-5.901l-1.401-3.838 C9.848,7.756,9.389,7.699,9.389,7.699C8.904,7.67,8.961,6.93,9.446,6.958c0,0,1.484,0.114,2.368,0.114 c0.94,0,2.397-0.114,2.397-0.114c0.485-0.028,0.542,0.684,0.057,0.741c0,0-0.488,0.057-1.029,0.085l3.249,9.665l0.897-2.996 C17.841,13.284,18.069,12.316,18.069,11.546z M19.889,7.686c0.039,0.286,0.06,0.593,0.06,0.924c0,0.912-0.171,1.938-0.684,3.22 l-2.746,7.94c2.673-1.558,4.47-4.454,4.47-7.771C20.991,10.436,20.591,8.967,19.889,7.686z M12,22C6.486,22,2,17.514,2,12 C2,6.486,6.486,2,12,2c5.514,0,10,4.486,10,10C22,17.514,17.514,22,12,22z'></path></svg>                    </a>
                    </li>
                    ";}
                if ($info["Linkedin"]) {echo "
                    <li class='linkedin'>
                        <a href='".$info["Linkedin"]."' target='_blank' rel='noopener noreferrer'>
                            <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z'></path></svg>
                        </a>
                    </li>
                    ";}
                    if ($info["Github"]) {echo "
                    <li class='github'>
                        <a href='".$info["Github"]."' target='_blank' rel='noopener noreferrer'>
                            <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M12,2C6.477,2,2,6.477,2,12c0,4.419,2.865,8.166,6.839,9.489c0.5,0.09,0.682-0.218,0.682-0.484 c0-0.236-0.009-0.866-0.014-1.699c-2.782,0.602-3.369-1.34-3.369-1.34c-0.455-1.157-1.11-1.465-1.11-1.465 c-0.909-0.62,0.069-0.608,0.069-0.608c1.004,0.071,1.532,1.03,1.532,1.03c0.891,1.529,2.341,1.089,2.91,0.833 c0.091-0.647,0.349-1.086,0.635-1.337c-2.22-0.251-4.555-1.111-4.555-4.943c0-1.091,0.39-1.984,1.03-2.682 C6.546,8.54,6.202,7.524,6.746,6.148c0,0,0.84-0.269,2.75,1.025C10.295,6.95,11.15,6.84,12,6.836 c0.85,0.004,1.705,0.114,2.504,0.336c1.909-1.294,2.748-1.025,2.748-1.025c0.546,1.376,0.202,2.394,0.1,2.646 c0.64,0.699,1.026,1.591,1.026,2.682c0,3.841-2.337,4.687-4.565,4.935c0.359,0.307,0.679,0.917,0.679,1.852 c0,1.335-0.012,2.415-0.012,2.741c0,0.269,0.18,0.579,0.688,0.481C19.138,20.161,22,16.416,22,12C22,6.477,17.523,2,12,2z'></path></svg>
                        </a>
                    </li>
                    ";}
                    if ($info["Lattes"]) {echo "
                    <li class='lattes lattes-icon'>
                        <a href='".$info["Lattes"]."' target='_blank' rel='noopener noreferrer'></a>
                    </li>
                    ";}
                    if ($info["Google scholar"]) {echo "
                    <li class='google_scholar google-scholar-icon'>
                        <a href='".$info["Google scholar"]."' target='_blank' rel='noopener noreferrer'>
    
                        </a>
                    </li>
                    ";}
                    if ($info["Email contato"]) {echo "
                    <li class='email_contato'>
                        <a href='mailto:".$info["Email contato"]."'>
                            <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19,5H5c-1.1,0-2,.9-2,2v10c0,1.1.9,2,2,2h14c1.1,0,2-.9,2-2V7c0-1.1-.9-2-2-2zm.5,12c0,.3-.2.5-.5.5H5c-.3,0-.5-.2-.5-.5V9.8l7.5,5.6,7.5-5.6V17zm0-9.1L12,13.6,4.5,7.9V7c0-.3.2-.5.5-.5h14c.3,0,.5.2.5.5v.9z'></path></svg>
                        </a>
                    </li>
                    ";}
                echo "
                </ul>
            </div>
                <div class='card_academic'>";
                    if ($info['Interesses']){
                        echo "<p class='orient interest'><b>Areas of Interest:</b><br>".str_replace(",","<br>",$info["Interesses"])."</p>";
                    }
                    
                    if ($info['Vídeo']){
                        echo "<a href='".$info["Vídeo"]."' target='_blank' rel='noopener noreferrer'>Presentation Video</a>";
                    }
            echo "
                </div>
            </div>
        </div>
        ";
}

// Função que printa os dados dos undergraduates, MSC, PHD na página TEAM
function print_student($info) {
    echo "
    <div class='card'>
        <div class='teste'>
            <div class='card_infos'>
                <div class='card_image'>";
                if ($info["File Name"]) {
                    echo "<img src='/wp-content/uploads".$info["File Name"]."' alt='Profile picture'>";
                } else {
                    echo "<img src='https://lsc.ic.unicamp.br/wp-content/uploads/2024/10/std_prof.png' alt='Profile picture'>";
                }
    echo "
                </div>
                <h3 class='card_nome'> ".$info["Full Name"]."</h3>
                <p class='card_curso'> ".$info["Course"]."</p>
            </div>
            <div class='card_academic'>";
                if ($info['Advisor']){
                    echo "<p class='orient'><b>Advisor:</b> ".$info["Advisor"]."</p>";
                }
                if ($info['Co-advisor']){
                    echo "<p class='orient2'><b>Co-advisor:</b> ".$info["Co-advisor"]."</p>";
                }
                echo "<p class='pesquisa'><b>Research Title:</b> ".$info["Research Title"]."</p>";
                if ($info["Research Link"]) {
                    echo "<a class='link_pesquisa' href='".$info["Research Link"]."' target='_blank' rel='noopener noreferrer'>Research link</a>";
                }
        echo "
            </div>
        </div>
        <div class='card_social'>
            <ul>";
            if ($info["Linkedin"]) {echo "
                <li class='linkedin'>
                    <a href='".$info["Linkedin"]."' target='_blank' rel='noopener noreferrer'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z'></path></svg>
                    </a>
                </li>
                ";}
                if ($info["Github"]) {echo "
                <li class='github'>
                    <a href='".$info["Github"]."' target='_blank' rel='noopener noreferrer'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M12,2C6.477,2,2,6.477,2,12c0,4.419,2.865,8.166,6.839,9.489c0.5,0.09,0.682-0.218,0.682-0.484 c0-0.236-0.009-0.866-0.014-1.699c-2.782,0.602-3.369-1.34-3.369-1.34c-0.455-1.157-1.11-1.465-1.11-1.465 c-0.909-0.62,0.069-0.608,0.069-0.608c1.004,0.071,1.532,1.03,1.532,1.03c0.891,1.529,2.341,1.089,2.91,0.833 c0.091-0.647,0.349-1.086,0.635-1.337c-2.22-0.251-4.555-1.111-4.555-4.943c0-1.091,0.39-1.984,1.03-2.682 C6.546,8.54,6.202,7.524,6.746,6.148c0,0,0.84-0.269,2.75,1.025C10.295,6.95,11.15,6.84,12,6.836 c0.85,0.004,1.705,0.114,2.504,0.336c1.909-1.294,2.748-1.025,2.748-1.025c0.546,1.376,0.202,2.394,0.1,2.646 c0.64,0.699,1.026,1.591,1.026,2.682c0,3.841-2.337,4.687-4.565,4.935c0.359,0.307,0.679,0.917,0.679,1.852 c0,1.335-0.012,2.415-0.012,2.741c0,0.269,0.18,0.579,0.688,0.481C19.138,20.161,22,16.416,22,12C22,6.477,17.523,2,12,2z'></path></svg>
                    </a>
                </li>
                ";}
                if ($info["Lattes"]) {echo "
                <li class='lattes lattes-icon'>
                    <a href='".$info["Lattes"]."' target='_blank' rel='noopener noreferrer'></a>
                </li>
                ";}
                if ($info["Google Scholar"]) {echo "
                <li class='google_scholar google-scholar-icon'>
                    <a href='".$info["Google Scholar"]."' target='_blank' rel='noopener noreferrer'>

                    </a>
                </li>
                ";}
                if ($info["Contact Email"]) {echo "
                <li class='email_contato'>
                    <a href='mailto:".$info["Contact Email"]."'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19,5H5c-1.1,0-2,.9-2,2v10c0,1.1.9,2,2,2h14c1.1,0,2-.9,2-2V7c0-1.1-.9-2-2-2zm.5,12c0,.3-.2.5-.5.5H5c-.3,0-.5-.2-.5-.5V9.8l7.5,5.6,7.5-5.6V17zm0-9.1L12,13.6,4.5,7.9V7c0-.3.2-.5.5-.5h14c.3,0,.5.2.5.5v.9z'></path></svg>
                    </a>
                </li>
                ";}
        echo "
            </ul>
        </div>
    </div>
    ";
}

// Função que printa os dados dos Pesquisadores e colaboradores na página TEAM
function print_collab($info) {
    echo "
    <div class='card'>
        <div class='teste'>
            <div class='card_infos'>
                <div class='card_image'>";
                if ($info["Foto"]) {
                    echo "<img src='".$info["Foto"]."' alt='Profile picture'>";
                } else {
                    echo "<img src='https://lsc.ic.unicamp.br/wp-content/uploads/2024/10/std_prof.png' alt='Profile picture'>";
                }
        echo "
                </div>
                <h3 class='card_nome'> ".$info["Nome"]."</h3>
            </div>
            <div class='card_academic'>";
                if ($info['Posicao']){
                    echo "<p class='orient posicao'>".$info["Posicao"]."</p>";
                }
        echo "
            </div>
        </div>
        <div class='card_social'>
            <ul>";
            if ($info["Site pessoal"]) {echo "
                <li class='site_pessoal'>
                    <a href='".$info["Site pessoal"]."' target='_blank' rel='noopener noreferrer'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M12.158,12.786L9.46,20.625c0.806,0.237,1.657,0.366,2.54,0.366c1.047,0,2.051-0.181,2.986-0.51 c-0.024-0.038-0.046-0.079-0.065-0.124L12.158,12.786z M3.009,12c0,3.559,2.068,6.634,5.067,8.092L3.788,8.341 C3.289,9.459,3.009,10.696,3.009,12z M18.069,11.546c0-1.112-0.399-1.881-0.741-2.48c-0.456-0.741-0.883-1.368-0.883-2.109 c0-0.826,0.627-1.596,1.51-1.596c0.04,0,0.078,0.005,0.116,0.007C16.472,3.904,14.34,3.009,12,3.009 c-3.141,0-5.904,1.612-7.512,4.052c0.211,0.007,0.41,0.011,0.579,0.011c0.94,0,2.396-0.114,2.396-0.114 C7.947,6.93,8.004,7.642,7.52,7.699c0,0-0.487,0.057-1.029,0.085l3.274,9.739l1.968-5.901l-1.401-3.838 C9.848,7.756,9.389,7.699,9.389,7.699C8.904,7.67,8.961,6.93,9.446,6.958c0,0,1.484,0.114,2.368,0.114 c0.94,0,2.397-0.114,2.397-0.114c0.485-0.028,0.542,0.684,0.057,0.741c0,0-0.488,0.057-1.029,0.085l3.249,9.665l0.897-2.996 C17.841,13.284,18.069,12.316,18.069,11.546z M19.889,7.686c0.039,0.286,0.06,0.593,0.06,0.924c0,0.912-0.171,1.938-0.684,3.22 l-2.746,7.94c2.673-1.558,4.47-4.454,4.47-7.771C20.991,10.436,20.591,8.967,19.889,7.686z M12,22C6.486,22,2,17.514,2,12 C2,6.486,6.486,2,12,2c5.514,0,10,4.486,10,10C22,17.514,17.514,22,12,22z'></path></svg>                    </a>
                </li>
                ";}
            if ($info["Linkedin"]) {echo "
                <li class='linkedin'>
                    <a href='".$info["Linkedin"]."' target='_blank' rel='noopener noreferrer'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z'></path></svg>
                    </a>
                </li>
                ";}
                if ($info["Github"]) {echo "
                <li class='github'>
                    <a href='".$info["Github"]."' target='_blank' rel='noopener noreferrer'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M12,2C6.477,2,2,6.477,2,12c0,4.419,2.865,8.166,6.839,9.489c0.5,0.09,0.682-0.218,0.682-0.484 c0-0.236-0.009-0.866-0.014-1.699c-2.782,0.602-3.369-1.34-3.369-1.34c-0.455-1.157-1.11-1.465-1.11-1.465 c-0.909-0.62,0.069-0.608,0.069-0.608c1.004,0.071,1.532,1.03,1.532,1.03c0.891,1.529,2.341,1.089,2.91,0.833 c0.091-0.647,0.349-1.086,0.635-1.337c-2.22-0.251-4.555-1.111-4.555-4.943c0-1.091,0.39-1.984,1.03-2.682 C6.546,8.54,6.202,7.524,6.746,6.148c0,0,0.84-0.269,2.75,1.025C10.295,6.95,11.15,6.84,12,6.836 c0.85,0.004,1.705,0.114,2.504,0.336c1.909-1.294,2.748-1.025,2.748-1.025c0.546,1.376,0.202,2.394,0.1,2.646 c0.64,0.699,1.026,1.591,1.026,2.682c0,3.841-2.337,4.687-4.565,4.935c0.359,0.307,0.679,0.917,0.679,1.852 c0,1.335-0.012,2.415-0.012,2.741c0,0.269,0.18,0.579,0.688,0.481C19.138,20.161,22,16.416,22,12C22,6.477,17.523,2,12,2z'></path></svg>
                    </a>
                </li>
                ";}
                if ($info["Lattes"]) {echo "
                <li class='lattes lattes-icon'>
                    <a href='".$info["Lattes"]."' target='_blank' rel='noopener noreferrer'></a>
                </li>
                ";}
                if ($info["Google scholar"]) {echo "
                <li class='google_scholar google-scholar-icon'>
                    <a href='".$info["Google scholar"]."' target='_blank' rel='noopener noreferrer'>

                    </a>
                </li>
                ";}
                if ($info["Email contato"]) {echo "
                <li class='email_contato'>
                    <a href='mailto:".$info["Email contato"]."'>
                        <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19,5H5c-1.1,0-2,.9-2,2v10c0,1.1.9,2,2,2h14c1.1,0,2-.9,2-2V7c0-1.1-.9-2-2-2zm.5,12c0,.3-.2.5-.5.5H5c-.3,0-.5-.2-.5-.5V9.8l7.5,5.6,7.5-5.6V17zm0-9.1L12,13.6,4.5,7.9V7c0-.3.2-.5.5-.5h14c.3,0,.5.2.5.5v.9z'></path></svg>
                    </a>
                </li>
                ";}
        echo "
            </ul>
        </div>
    </div>
    ";
}

// Função que printa os dados dos alumni na página ALUMNI
function print_alumni($infos) {
	$infos['Foto'] = 
                empty($infos['Foto']) ?
                'https://lsc.ic.unicamp.br/wp-content/uploads/2024/10/std_prof.png' :
                $infos['Foto'];

            echo "
                <div class='card'>
                    <div class='teste'>
                    <div class='card_infos'>
                        <div class='card_image'>
                            <img src='".$infos['Foto']."'>
                        </div>
                            <h3>".$infos['Aluno']."</h3>
            ";

            if ($infos['Posição atual']) {
                echo "
                        <p>".$infos['Posição atual']."</p>

                ";
            };

            if ($infos['Tipo'] == "Alumni" || empty($infos['Ano de defesa'])) {
                echo "
                    </div>
                    <div class='card_academic'></div>
                    </div>
                    <div class='card_social'>

                ";
            } else {

                echo "
                        </div>
                        <div class='card_academic'>
                            <p>Defended his <strong>".$infos['Tipo']."</strong> in <strong>".$infos['Ano de defesa']."</strong></p>
                            <p>Guided by <a href='/team/#professors'>".$infos['Orientador']."</a></p>
                        </div>
                        </div>
                        <div class='card_social'>

                ";

            };

            if ($infos['Linkedin']) {
                echo "
                        <ul>
                            <li class='linkedin'>
                                <a href='".$infos['Linkedin']."' target='_blank' rel='noopener noreferrer'>
                                    <svg width='24' height='24' viewBox='0 0 24 24' version='1.1' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false'><path d='M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z'></path></svg>
                                </a>
                            </li>
                        </ul>
                ";
            };
            
                    
            echo "
                    </div>
                </div>
            ";
}

// Função que transforma um arquivo TSV($fd), cuja primeira linha é um header($labels),
// em um array associativo de chave($_key)
function transf_assoc_array($labels, $fd, $_key) {
    $ret_array = [];
    while (($data = fgetcsv($fd, 10000, "\t", '"', "\\")) != FALSE) {
        $temp = [];
        for ($i=0; $i < count($data); $i++) { 
            $temp[$labels[$i]]=$data[$i];
        }	
        $ret_array[$temp[$_key]]=$temp;
    }

    return $ret_array;
}

