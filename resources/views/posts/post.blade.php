@extends('layouts.app')
@section('title')
Post
@endsection
@section('content')
    <!-- Single Blog Post Area -->
    <section class="singl-blog-post-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Area -->
                    <div class="blog-details-area mb-50">
                        <!-- Image -->
                        <img class="mb-30" src="img/bg-img/blog-3.jpg" alt="blog-img">

                        <!-- Blog Title -->
                        <h3 class="mb-30">Top 10 Handbags in 2019</h3>

                        <!-- Bar Area -->
                        <div class="status-bar mb-15">
                            <a href="#"><i class="icofont-user-male"></i> Jannatun</a>
                            <a href="#"><i class="icofont-ui-clock"></i> 16 Sep, 19</a>
                            <a href="#"><i class="icofont-tags"></i> Handbags</a>
                            <a href="#"><i class="icofont-speech-comments"></i> 3 Comments</a>
                        </div>

                        <!-- Single Blog Details Area -->
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.ut labore et dolore magnam aliquam quaerat voluptatem.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam qui, molestiae est, rerum molestias esse sunt eos odio provident quos nihil repellat iusto alias repellendus. Sapiente animi voluptatum laudantium molestiae vel voluptates atque nisi, possimus tempora dicta illum consectetur. Sint dolore voluptate, doloribus facere ea ratione dolorem, iusto reprehenderit repellendus ut labore! Corporis voluptatum perspiciatis neque, ipsa sapiente quibusdam culpa veniam nesciunt, dolore eos, ad omnis repellendus quia.</p>

                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In architecto rem omnis quia ipsa. Nulla sapiente aut illum error modi, repellendus temporibus non ipsum alias recusandae ex hic veritatis cum.</p>
                            </div>
                            <div class="col-12 col-lg-5">
                                <img class="mb-3" src="img/bg-img/blog-1.jpg" alt="">
                            </div>
                        </div>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates officiis consectetur incidunt eveniet mollitia itaque tempore eius asperiores. Iste praesentium libero unde maiores, aspernatur numquam deserunt quisquam doloremque reprehenderit, hic ducimus fugit. Distinctio maxime harum ipsam sunt, voluptatem quod ut?</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias corporis itaque qui expedita eligendi error asperiores tempore voluptates officia. Cum inventore laborum ipsum eum harum? Obcaecati tenetur facere sint officiis voluptate quam quidem magnam quibusdam praesentium asperiores accusantium et sed reprehenderit animi, tempora unde necessitatibus ad ut accusamus repudiandae inventore hic, velit distinctio. Voluptatem, quo, nesciunt. Ipsam ducimus illo et nihil unde, non numquam tenetur est dicta eveniet iusto cum recusandae voluptatem hic tempora ad laborum quasi qui.</p>

                        <img class="mb-3" src="img/bg-img/blog-5.jpg" alt="">

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est veritatis, aspernatur amet modi et, atque, molestiae impedit facilis non aliquid adipisci perferendis eius quas saepe. Optio sapiente temporibus rerum, est quasi similique voluptatibus officia laudantium ducimus alias, deleniti repellat nesciunt repudiandae autem.</p>
                    </div>

                    <div class="comments-area">
                        <div class="comment_area mb-50 clearfix">
                            <h5 class="mb-4">3 Comments</h5>

                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <div class="comment-wrapper clearfix">
                                        <div class="comment-meta">
                                            <div class="comment-author-img">
                                                <img class="img-circle" src="img/partner-img/tes-1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <h5 class="comment-author"><a href="#">Lim Jannat</a></h5>
                                            <p>This post is very helpful. I like your fashion tips. Keep up awesome job!</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                    <ul class="children">
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper clearfix">
                                                <div class="comment-meta">
                                                    <div class="comment-author-img">
                                                        <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <h5 class="comment-author"><a href="#">Nazrul Islam</a></h5>
                                                    <p>Thanks for your valuable feedback @Lim Jannat. Stay with us.</p>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex clearfix">
                                        <div class="comment-meta">
                                            <div class="comment-author-img">
                                                <img class="img-circle" src="img/partner-img/tes-3.png" alt="">
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <h5 class="comment-author"><a href="#">Naznin Ritu</a></h5>
                                            <p>Great post about treanding fashion 2019. Thank you.</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                    <ul class="children">
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper clearfix">
                                                <div class="comment-meta">
                                                    <div class="comment-author-img">
                                                        <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <h5 class="comment-author"><a href="#">Nazrul Islam</a></h5>
                                                    <p>Thanks for your valuable feedback @Naznin Ritu, Stay with us.</p>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <div class="contact_from mb-50">
                            <h5 class="mb-4">Leave a Comment</h5>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mb-30">
                                            <input type="text" class="form-control" name="author" value="" placeholder="Name" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mb-30">
                                            <input type="text" class="form-control" name="email" value="" placeholder="Email" tabindex="2">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-30">
                                            <input type="text" class="form-control" name="url" value="" placeholder="Website (Optional)" tabindex="3">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-30">
                                            <textarea class="form-control" name="comment" cols="30" rows="7" placeholder="Comment" tabindex="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog_sidebar">
                        <!-- Search Post -->
                        <div class="widget-area search_post mb-30">
                            <h6>Search Post</h6>
                            <form action="#" method="get">
                                <input type="search" class="form-control" placeholder="Enter Keyword...">
                                <button type="submit" class="btn d-none">Submit</button>
                            </form>
                        </div>

                        <!-- Latest Post -->
                        <div class="widget-area latest_post mb-30">
                            <h6>Recent Post</h6>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/lp-1.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/lp-2.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/lp-3.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>
                        </div>

                        <!-- Catagory -->
                        <div class="widget-area catagory_section mb-30">
                            <h6>Catagory</h6>
                            <ul>
                                <li><a href="#">Women <span class="text-muted">(21)</span></a></li>
                                <li><a href="#">Men <span class="text-muted">(5)</span></a></li>
                                <li><a href="#">Fashion <span class="text-muted">(17)</span></a></li>
                                <li><a href="#">Electronice <span class="text-muted">(11)</span></a></li>
                                <li><a href="#">Sports <span class="text-muted">(16)</span></a></li>
                                <li><a href="#">Intimates <span class="text-muted">(9)</span></a></li>
                            </ul>
                        </div>

                        <!-- Achives -->
                        <div class="widget-area achive_section mb-30">
                            <h6>Achives</h6>
                            <ul>
                                <li><a href="#">September - 2019</a></li>
                                <li><a href="#">Auguest - 2019</a></li>
                                <li><a href="#">July - 2019</a></li>
                                <li><a href="#">June - 2019</a></li>
                                <li><a href="#">May - 2019</a></li>
                                <li><a href="#">April - 2019</a></li>
                            </ul>
                        </div>

                        <!-- Tages -->
                        <div class="widget-area tag_section mb-30">
                            <h6>Tags Cloud</h6>
                            <ul>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Electronice</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Intimates</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Rompers</a></li>
                                <li><a href="#">Bras</a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Bottom</a></li>
                                <li><a href="#">T-shirts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single-->
@endsection
