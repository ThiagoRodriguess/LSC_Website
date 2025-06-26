<?php
// Template Name: Team Dinâmico
get_header();

?>

<div class="telao">
    <div class="telao_filtro">

        <div class="telao_aux" style="background-color: #ffc">
            <h3>Team</h3>
        </div>
        <div class="telao_saia" style="background-color: #ff0">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M1000,50l-182.69,-45.286l-292.031,61.197l-190.875,-41.075l-143.748,28.794l-190.656,-23.63l0,70l1000,0l0,-50Z" style="opacity: 0.4"></path><path d="M1000,57l-152.781,-22.589l-214.383,19.81l-159.318,-21.471l-177.44,25.875l-192.722,5.627l-103.356,-27.275l0,63.023l1000,0l0,-43Z"></path></svg>
        </div>
    </div>
</div>

<div class="telinha">
    <p class="telinha_txt">
    Established in 1997 as an initiative of Prof. Guido Araujo, the Computer Systems Laboratory (LSC) operates as a dedicated research division within the Institute of Computing at the University of Campinas. Committed to the evolution and enhancement of computer system technologies, LSC's core mission revolves around undertaking cutting-edge research and innovation in this rapidly advancing field. The Laboratory concentrates its explorations on key research areas such as Digital Systems Design, Computer Architecture, Parallel Computing, Embedded Systems, and Compilers, with an ongoing focus on integrating advancements in these disciplines to push the frontiers of technology.
    </p>
</div>

<!-- PROFESSORS -->
<div>
    <?php
        // Professores
        $open = fopen(get_field('professors_file'), "r");
        $campos = fgetcsv($open, 10000, "\t");
        $professors = transf_assoc_array($campos, $open, 'Nome');
        // print_r($professors);
    ?>
    <h3 class="section_title">Professors</h3>
    <div class='cards_container professors'>
        <?php foreach ($professors as $key => $info) {
            print_professor($info);
        }
        ?>
    </div>
</div>

<!-- COLLABORATORS -->
<div>
    <?php 
        // Collaborators
        $open = fopen(get_field('collaborators_researchers_file'), "r");
        $campos = fgetcsv($open, 10000, "\t");
        $collab_res = transf_assoc_array($campos, $open, 'Nome');
        // print_r($collab_res);
    ?>
    <h3 class="section_title">Collaborators</h3>
    <div class='cards_container'>
        <?php foreach ($collab_res as $key => $info) {
            if ($info['Tipo'] == 'Collaborator') {
                print_collab($info);
            }    
        }
        ?>
    </div>
</div>

<!-- RESEARCHERS -->
<div>
    <h3 class="section_title">Researchers</h3>
    <div class='cards_container'>
        <?php foreach ($collab_res as $key => $info) {
            if ($info['Tipo'] == 'Researcher') {
                print_collab($info);
            }
        }
        ?>
    </div>
</div>

<!-- PHD -->
<div>
    <?php
        // PHD
        $open = fopen(get_field('students_file'), "r");
        $campos = fgetcsv($open, 10000, "\t");
        $data = transf_assoc_array($campos, $open, 'Full Name');
        ksort($data);
    ?>
    <h3 class="section_title">PhD Students</h3>
    <div class='cards_container'>
        <?php
            foreach ($data as $key => $info) {
                if($data[$key]['Academic Level']=="PhD") {
                    print_student($info);
                }
            }
        ?>
    </div>
</div>

<!-- MSc -->
<div>
    <h3 class="section_title">MSc Students</h3>
    <div class='cards_container'>
    <?php
    foreach ($data as $key => $info) {
        if($data[$key]['Academic Level']=="MsC") {
            print_student($info);
        }
    }
    ?>
    </div>
</div>

<!-- UNDERGRADUATES -->
<div>
    <h3 class="section_title">Undergraduates</h3>
    <div class='cards_container'>
    <?php
    foreach ($data as $key => $info) {
        if($data[$key]['Academic Level']=="Undergraduate") {
            print_student($info);
        }
    }
    ?>
    </div>
</div>


<?php
get_footer();
?>