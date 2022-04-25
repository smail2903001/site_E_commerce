<!--   product  -->
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Procéder au paiment</button>
                    </div>
                    <div class="col">
                        <?php
                        if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">déjà en panier</button>';
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Ajouter à la carte</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "inconnu"; ?></h5>
                <small>Genre: <?php echo $item['item_brand'] ?? "Genre"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 évaluations | 1000+ questions répondues</a>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>prix avant réduction:</td>
                        <td><strike><?php echo $item['item_price'] ?? 0; ?></strike> MAD</td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>dernier prix:</td>
                        <td class="font-size-20 text-danger"><span><?php echo $item['item_price']-20 ?? 0;?> MAD</span><small class="text-dark font-size-12">&nbsp;&nbsp;</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>vous avez bénéficié d'une réduction de:</td>
                        <td><span class="font-size-16 text-danger">20 dh</span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 jours <br> Remplacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Délivré en 3 <br>jours</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Ans <br>de garantie</a>
                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Délivré :<?php
                    // Return current date from the remote server
                    $date = date('d-m');
                    echo $date;
                    ?></small>
                </div>
                <!-- !order-details -->

                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qté</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>

            </div>
            <div class="col-12">
                <h6 class="font-rubik">Description de Produit </h6>
                <hr>
                <p class="font-rale font-size-14"><?php echo $item['item_description'] ?? 'pas de description' ?></p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?>