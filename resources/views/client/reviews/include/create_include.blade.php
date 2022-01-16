<div class="tab-pane fade {{ Route::is('reviews.create')?'show active': '' }}" id="order" role="tabpanel">
    <div class="order-content">
        <h3 class="account-sub-title d-none d-md-block">
            <i class="sicon-social-dropbox align-middle mr-3"></i>Note le produit
        </h3>
        <form id="email-form" action="{{route('reviews.store',$produit)}}" method="post" style="display: block;">
                @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="titre">Titre <font color="red">*</font></label>
                <input type="text" name="titre" id="" tabindex="1" class="form-control"
                        placeholder="Votre Avis" value="{{isset($review)? $review->titre:''}}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12 group-note">
                <label for="note">Note <font color="red">*</font></label> <br>
                <label for="" class="cl_or">
                    <input type="radio" name="note" value="5" required checked>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="cl_black"> (5/5)</span>
                </label>
            </div>
            <div class="form-group col-md-12 group-note">
                <label for="">
                    <input type="radio" name="note" value="4" required>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="cl_black"> (4/5)</span>
                </label>
            </div>
            <div class="form-group col-md-12 group-note">
                <label for="">
                    <input type="radio" name="note" value="3" required>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="cl_black"> (3/5)</span>
                </label>
            </div>
            <div class="form-group col-md-12 group-note">
                <label for="">
                    <input type="radio" name="note" value="2" required>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="cl_black"> (2/5)</span>
                </label>
            </div>
            <div class="form-group col-md-12 group-note">
                <label for="">
                    <input type="radio" name="note" value="1" required>
                    <span class="fa fa-stack cl_or"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                    <span class="cl_black"> (1/5)</span>
                </label>
            </div>
            <div class="form-group col-md-12">
                <label for="phone1">Commentaire <font color="red">*</font></label>
                <textarea  name="commentaire" id="commentaire" tabindex="1" class="form-control"
                            placeholder="Votre commentaire"  required>{{isset($review)? $review->commentaire:''}}</textarea>
            </div>
            <div class="form-group col-md-3">
                <button id="" type="submit" class="btn btn-dark mr-0 ">
                    Enregistrer
                </button>
            </div>
        </form>
        </div>
       
    </div>
</div><!-- End .tab-pane -->