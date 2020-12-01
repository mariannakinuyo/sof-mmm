<?php function componente_relacionados() { ?>


<div class="container relacionados">
    <div class="row">
        <div class="col-12 col-lg-4 offset-lg-4">
            <h3 class="highlight text-center"><strong>ARTIGOS RELACIONADOS</strong></h3>
        </div>
    </div>

    <div class="row">
        <?php  
            $postID = get_the_ID();
            $categoria = get_the_category( $postID )[0];

            $posts_rel = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby'=>'id', 
                'order'=>'DESC',
                'hide_empty' => true,
                'posts_per_page' => 3,
                'cat' => $categoria->term_id,
            ) );

            foreach ( $posts_rel->posts as $i => $post) {
                $link = get_permalink( $post->ID );
                $linha_fina = get_field('linha_fina');
                $categoria = get_the_category( $post->ID )[0];
        ?>

            <div class="col-12 col-lg-4">
                <div class="card-relacionados">
                    <p class="name-categoria">
                        <?php echo $categoria->name ?>
                        <span class="float-right"><?php echo get_the_date('d/m/Y') ?></span>
                    </p>
                    <h5><?php echo get_the_title( $post->ID ); ?></h5>
                </div>
                <p class="linha-fina"><?php echo $linha_fina; ?></p>
            </div>

        <?php } ?>

    </div>
</div>



<?php
}