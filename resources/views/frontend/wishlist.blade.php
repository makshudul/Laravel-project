@extends('frontend.master')
@section('content')

            <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">
                    <div class="cart_table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th class="text-center">PRICE</th>
                                    <th class="text-center">STOCK STATUS</th>
                                    <th class="text-center">ADD TO CART</th>
                                    <th class="text-center">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <img src="assets/images/compare/compare_img_1.jpg" alt="image_not_found" />
                                            <h3>Your Product Title Here</h3>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="price_text">$10.50</span></td>
                                    <td class="text-center"><span class="price_text text-success">In Stock</span></td>
                                    <td class="text-center">
                                        <a href="#!" class="btn btn_primary">Add To Cart</a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <img src="assets/images/compare/compare_img_2.jpg" alt="image_not_found" />
                                            <h3>Your Product Title Here</h3>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="price_text">$10.50</span></td>
                                    <td class="text-center"><span class="price_text text-danger">Out Stock</span></td>
                                    <td class="text-center">
                                        <a href="#!" class="btn btn_primary">Add To Cart</a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <img src="assets/images/compare/compare_img_3.jpg" alt="image_not_found" />
                                            <h3>Your Product Title Here</h3>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="price_text">$10.50</span></td>
                                    <td class="text-center"><span class="price_text text-success">In Stock</span></td>
                                    <td class="text-center">
                                        <a href="#!" class="btn btn_primary">Add To Cart</a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- cart_section - end
            ================================================== -->
@endsection
