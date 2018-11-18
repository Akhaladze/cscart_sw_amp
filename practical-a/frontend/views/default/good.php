 <amp-state id="cart">
    <script type="application/json">
      {
        "added": false
      }
    </script>
  </amp-state>

  <main id="content" role="main" class="main">
    <div class="commerce-cart-notification fixed col-12 right-0 mx0 md-mx2">
  <h1 class="display-none   ">Your Basket</h1>
    <div class="commerce-cart-item flex flex-wrap items-center m0 p2 ">
      <div class="col-3 sm-col-2 md-col-2 lg-col-2">
        <amp-img class="commerce-cart-item-image" src="../../img/e-commerce/product/product-8.jpg" width="1" height="1" layout="responsive" alt="Caliper Brakes" noloading="">
<div placeholder="" class="commerce-loader"></div>        </amp-img>
      </div>
      <div class="commerce-cart-item-desc px1 col-6 sm-col-7 md-col-7 lg-col-7">
        <div class="h6 mb1">Caliper Brakes</div>
        <div>Fits most wheel sizes and designed to last long.</div>
      </div>
      <div class="commerce-cart-item-price col-3 h6 flex flex-wrap justify-around items-start">
        <span>£349</span>
        <span>1</span>
        <div role="button" class="inline-block commerce-cart-icon" tabindex="0">✕</div>
      </div>
    </div>
    <div class="commerce-cart-item flex flex-wrap items-center m0 p2 ">
      <div class="col-3 sm-col-2 md-col-2 lg-col-2">
        <amp-img class="commerce-cart-item-image" src="../../img/e-commerce/product/product-1.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
<div placeholder="" class="commerce-loader"></div>        </amp-img>
      </div>
      <div class="commerce-cart-item-desc px1 col-6 sm-col-7 md-col-7 lg-col-7">
        <div class="h6 mb1">Sprocket Set</div>
        <div>Steel, designed for long lasting stability.</div>
      </div>
      <div class="commerce-cart-item-price col-3 h6 flex flex-wrap justify-around items-start">
        <span>£470</span>
        <span>1</span>
        <div role="button" class="inline-block commerce-cart-icon" tabindex="0">✕</div>
      </div>
    </div>
      <div class="flex p2 mxn1 md-py3">
        <a href="#" class="ampstart-btn ampstart-btn-secondary caps center col col-6 mx1">send</a>
        <a href="checkout.amp.html" class="ampstart-btn caps center col col-6 mx1">checkout</a>
      </div>
    </div>

    <amp-state id="product">
      <script type="application/json">
        {
        "price": "£470",
        "selectedColor": "black",
          "black": {
            "thumb": {
              "image1": "../img/e-commerce/product/dark-small-1.jpg",
              "image2": "../img/e-commerce/product/dark-small-2.jpg",
              "image3": "../img/e-commerce/product/dark-small-3.jpg"
            },
            "large": {
              "image1": "../img/e-commerce/product/dark-large-1.jpg",
              "image2": "../img/e-commerce/product/dark-large-2.jpg",
              "image3": "../img/e-commerce/product/dark-large-3.jpg"
            }
          },
          "blue": {
            "thumb": {
              "image1": "../img/e-commerce/product/light-small-1.jpg",
              "image2": "../img/e-commerce/product/light-small-2.jpg",
              "image3": "../img/e-commerce/product/light-small-3.jpg"
            },
            "large": {
              "image1": "../img/e-commerce/product/light-large-1.jpg",
              "image2": "../img/e-commerce/product/light-large-2.jpg",
              "image3": "../img/e-commerce/product/light-large-3.jpg"
            }
          },
        "selectedSlide": 0
      }
      </script>
    </amp-state>

    <section class="flex flex-wrap pb4 md-pb7">
      <div class="col-12 md-col-6 px2 pt2 md-pl7 md-pt4">
        <amp-carousel width="1280" height="720" layout="responsive" type="slides" [slide]="product.selectedSlide" on="slideChange: AMP.setState({product: {selectedSlide: event.index}})">
          <amp-img [src]="product[product.selectedColor].large.image1" src="../img/e-commerce/product/dark-large-1.jpg" width="1280" height="720" layout="responsive" role="button" tabindex="0" alt="product image" noloading="">
<div placeholder="" class="commerce-loader"></div>          </amp-img>
          <amp-img [src]="product[product.selectedColor].large.image2" src="../img/e-commerce/product/dark-large-2.jpg" width="1280" height="720" layout="responsive" role="button" tabindex="0" alt="product image" noloading="">
<div placeholder="" class="commerce-loader"></div>          </amp-img>
          <amp-img [src]="product[product.selectedColor].large.image3" src="../img/e-commerce/product/dark-large-3.jpg" width="1280" height="720" layout="responsive" role="button" tabindex="0" alt="product image" noloading="">
<div placeholder="" class="commerce-loader"></div>          </amp-img>
        </amp-carousel>

        <amp-selector class="center" [selected]="product.selectedSlide" on="select:AMP.setState({product: {selectedSlide: event.targetOption}})">
          <ul class="list-reset inline-block">
            <li class="inline-block commerce-product-thumb">
              <amp-img option="0" layout="responsive" selected="selected" [src]="product[product.selectedColor].thumb.image1" src="../img/e-commerce/product/dark-small-1.jpg" width="320" height="180" alt="thumbnail"></amp-img>
            </li>
            <li class="inline-block commerce-product-thumb">
              <amp-img option="1" layout="responsive" [src]="product[product.selectedColor].thumb.image2" src="../img/e-commerce/product/dark-small-2.jpg" width="320" height="180" alt="thumbnail"></amp-img>
            </li>
            <li class="inline-block commerce-product-thumb">
              <amp-img option="2" layout="responsive" [src]="product[product.selectedColor].thumb.image3" src="../img/e-commerce/product/dark-small-3.jpg" width="320" height="180" alt="thumbnail"></amp-img>
            </li>
          </ul>
        </amp-selector>
      </div>
      <div class="col-12 md-col-6 flex flex-wrap content-start px2 md-pl5 md-pr7 md-pt4">
        <div class="col-6 self-start pb2">
          <h1 class="h3 md-h2">Road Bike</h1>
          <div class="h4 md-h3">£470</div>
        </div>
        <div class="col-6 self-start right-align">
          <h2 class="h7 block pb1">Reviews</h2>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
        </div>
        <div class="col-12 self-start pb4">Built with lightweight aluminum for speed.</div>
        <hr class="mb4">
        <div class="col-6 self-start pb4">
          <span class="h6 md-h7 align-top pr2">colour:</span>
          <amp-selector class="inline-block" name="color" layout="container" [selected]="product.selectedColor" on="select:AMP.setState({
                              product: {
                                selectedColor: event.targetOption
                              }
                            })">
            <ul class="m0 list-reset inline-block">
              <li class="inline-block mr1">
                <div option="black" selected="selected" class="commerce-product-color-swatch commerce-product-color-black"></div>
              </li>
              <li class="inline-block mr1">
                <div option="blue" class="commerce-product-color-swatch commerce-product-color commerce-product-color-blue"></div>
              </li>
            </ul>
          </amp-selector>
        </div>
        <div class="col-6 self-start pb4">
<div class="commerce-select-wrapper inline-block  ">
  <label for="sizes" class="bold caps h6 md-h7">Select a size: </label>
  <select name="sizes" id="sizes" class="commerce-select h6 md-h7">
      <option value="61cm">62cm</option>
      <option value="63cm">63cm</option>
      <option value="64cm">64cm</option>
      <option value="65cm">65cm</option>
  </select>
</div>
        </div>
        <hr class="mb4">
        <div class="col-12 self-start mb4 commerce-product-btn-wrapper">
          <button class="ampstart-btn ampstart-btn-secondary caps" on="tap:AMP.setState({cart: {added: true}})">Add to cart</button>
        </div>
        <hr class="md-hide lg-hide">
      </div>
      <div class="col-12 flex flex-wrap pb3">
        <hr class="xs-hide sm-hide mt4">
        <div class="col-12 md-col-6 px2 md-pl7 commerce-product-desc">
          <section class="pt3 md-pt6 md-px4">
            <h2 class="h5 md-h4">Overview</h2>
            <p class="mt2 mb3">Id lacus amet. Aliquam eos nunc ut scelerisque lacinia, eu rutrum id, vestibulum aliqua vivamus luctus eu rhoncus
              ut, sodales id. Velit lacus, fermentum neque et sagittis, ac venenatis volutpat, dolore neque feugiat proin
              fermentum odio, odio arcu in eu wisi. </p>
              <hr>
              <div class="pt3 md-pt4 md-pb4">
                <h2 class="h5 md-h4 mb2">Reviews</h2>
  <section class="mb3">
    <h3 class="h7 mb1">Tom - UK</h3>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
    <p class="mt1">Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </section>
  <section class="mb3">
    <h3 class="h7 mb1">Jerry - UK</h3>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
    <p class="mt1">Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </section>
  <section class="mb3">
    <h3 class="h7 mb1">Arthur - UK</h3>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
    <p class="mt1">Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </section>
              </div>
          </section>
        </div>
        <div class="col-12 md-col-5 md-pr7 md-pl5">
          <section class="pt3 pb3 md-pb4 px2 md-pt6">
            <h2 class="h5 md-h4">Size Guide</h2>
            <div class="mt2">
              <table class="commerce-table center">
                <thead class="commerce-table-header h7">
                  <tr>
                    <th>Rider Height</th>
                    <th colspan="2">Suggested Size</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>160cm-168cm</td>
                    <td>47-48cm</td>
                    <td>xx-small</td>
                  </tr>
                  <tr>
                    <td>152cm-160cm</td>
                    <td>49-50cm</td>
                    <td>x-small</td>
                  </tr>
                  <tr>
                    <td>148cm-152cm</td>
                    <td>49-50cm</td>
                    <td>x-small</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
          <section class="pt3 pb3 md-pt4 md-pb4 px2">
            <h2 class="h5 md-h4">Full spec</h2>
            <div class="mt2">
              <dl class="flex flex-wrap">
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">frame</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Hi-Ten steel</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">handlebars</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Chrome plated</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">stem</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Alloy quill stem</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">grips</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Rubber</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">gear shifter</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Rapidfire</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">gears</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">7 speed</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">chainset</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Steel</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">crank</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Alloy</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">pedals</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Alloy rat trap</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">brakes</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Side pull caliper brakes</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">rims</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Double wall alloy 20&quot;</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">tyres</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">700x19-28</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">saddle</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Vinyl saddle</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">seatpost</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Alloy micro adjust 600mm</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">kickstand</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Alloy</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">mudguards</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Hammered alloy</dd>
                <dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">carrier</dt>
                <dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">Chrome steel front</dd>
              </dl>
            </div>
          </section>
        </div>
		
		<?php /*
<section class="commerce-related-products col-12 px2 md-mt5 md-px4 ">
  <div class="col-12 mt3 md-mt4">
    <h2 class="h5 md-h4">You may also like</h2>
    <amp-carousel height="170" layout="fixed-height" type="carousel" class="px4">
      <ul class="list-reset">
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-1.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Sprocket Set</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-2.jpg" width="1" height="1" layout="responsive" alt="Fixie Blue" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Fixie Blue</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-3.jpg" width="1" height="1" layout="responsive" alt="Chain set" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Chain set</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-4.jpg" width="1" height="1" layout="responsive" alt="Leather Saddle" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Leather Saddle</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-5.jpg" width="1" height="1" layout="responsive" alt="16-Speed" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">16-Speed</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-6.jpg" width="1" height="1" layout="responsive" alt="Red Cruiser" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Red Cruiser</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-7.jpg" width="1" height="1" layout="responsive" alt="Horn Handles" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Horn Handles</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-8.jpg" width="1" height="1" layout="responsive" alt="Caliper Brakes" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Caliper Brakes</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-9.jpg" width="1" height="1" layout="responsive" alt="Road Bike" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Road Bike</h2>
            </a>
          </li>
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="../img/e-commerce/product/product-10.jpg" width="1" height="1" layout="responsive" alt="Wheel Set" noloading="">
<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6">Wheel Set</h2>
            </a>
          </li>
      </ul>
    </amp-carousel>
  </div>
</section>
*/?>

      </div>
    </section>
  </main>