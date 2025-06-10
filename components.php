<?php
//Activities display activities function 
function component($act_name, $act_price, $act_description, $act_img) {
    $element = '
    <div class="child11 h-100">
        <div class="c-img">
            <img src="' . $act_img . '">
        </div>

        <div class="head">
            <h1 class="mt-3">' . $act_name . '</h1>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
        </div>

        <div class="price-details">
            <div class="price">
                <h1 class="mt-1">R' . $act_price . '</h1>
                <span>Per Person</span>
            </div>
            <div class="view">
                <a href="activities.php" class="text-center"><strong>Go to Activities ></strong></a>
            </div>
        </div>
        <div class="details">
            <h3>Details</h3>
            <p>' . $act_description . '.</p>
        </div>
    </div>';

    echo $element;
}
//act 2
function componenta($act_name, $act_price, $act_description, $act_img) {
    $element = '
    <div class="child11 h-100">
        <div class="c-img">
            <img src="' . $act_img . '">
        </div>

        <div class="head">
            <h1 class="mt-3">' . $act_name . '</h1>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
        </div>

        <div class="price-details">
            <div class="price">
                <h1 class="mt-1">R' . $act_price . '</h1>
                <span>Per Person</span>
            </div>
            <div class="view">
                <a href="camps(2).php" class="text-center"><strong>Go To Camps ></strong></a>
            </div>
        </div>
        <div class="details">
            <h3>Details</h3>
            <p>' . $act_description . '.</p>
        </div>
    </div>';

    echo $element;
}

//camps

function camps($act_name, $act_price, $act_description,$act1,$act2,$act3,$act4, $act_img)
{
    $element ='
    <div class="item" data-key="1" data-price="899">
          <div class="img">
            <img src="' . $act_img . '" alt="">
          </div>
          <div class="content">
            <div class="title">' . $act_name . '</div>
            <div class="des">
            ' . $act_description . '.
              the following activities are available under this camp:
              <ul>
                <li>- '.$act1.'</li>
                <li>- '.$act2.'</li>
                <li>- '.$act3.'</li>
                <li>- '.$act4.'</li>
              </ul>
            </div>
            
            <div class="price">R' . $act_price . '/person</div>
            <button type="button" class="btn btn-success" onclick="openBookingModal(\'' . $act_name . '\', ' . $act_price . ')">Book Now</button>
            <button class="remove" onclick="Remove(1)"><i class="fa-solid fa-trash-can"></i></button>
          </div>
        </div>';
        echo $element;
}
function camps2($act_name, $act_description, $act_price, $info, $act1, $act2, $act3, $act4, $act_img)
{
    echo '
    <div class="item" data-key="2" data-price="699">
        <div class="img">
            <img src="' . $act_img . '" alt="">
        </div>
        <div class="content">
            <div class="title">' . $act_name . '</div>
            <div class="des">
                ' . $act_description . '
                <ul>
                    <li>- ' . $act1 . '</li>
                    <li>- ' . $act2 . '</li>
                    <li>- ' . $act3 . '</li>
                    <li>- ' . $act4 . '</li>
                </ul>
            </div>
            <div class="price">R' . $act_price . '/' . $info . '</div>
            <button type="button" class="btn btn-success" onclick="openBookingModal(\'' . $act_name . '\', ' . $act_price . ')">Book Now</button>
            <button class="remove" onclick="Remove(2)"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </div>';
}


?>