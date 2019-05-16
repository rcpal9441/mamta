@extends('frontend.app')
@section('title', 'Shape-Detail')

@section('content')
    <section class="sizes custom-shape bg-grey-01">
        <!-- Shapes container start -->
        
        <div class="container-fluid custom-shape-container">
            <div class="row">
                @foreach($shapes as $shape)
                <div class="custom-col">
                    <a href="{{route('shapefullview',$shape['slug'])}}" class="size-srch bg-gray">
                        <div class="size-icon icon1">
                            <img src="{{$shape['thumbnail']}}" alt="">
                        </div>
                        <div class="size-head">
                            <h3>{{$shape['name']}} </h3>
                        </div>
                    </a>
                </div>
                @endforeach
               <!--  <div class="custom-col">
                    <a href="cushion-custome-size.html" class="size-srch bg-gray">
                        <div class="size-icon icon16">
                            <img src="assets/images/icon/Custom-foam-icon.png" alt="">
                        </div>
                        <div class="size-head">
                            <h3>Custom Size</h3>
                        </div>
                    </a>
                </div> -->
        
            </div>
        </div>
        <!-- Shapes container END -->
        <div class="custom-size-define">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xl-8">
                        <div class="custom-shape-left white-bx text-center">
                            <div class="heading-06 text-left">
                                <h4>{{$shapeDetails['name']}}</h4>
                            </div>
                            <div class="image-bx">
                                <img src="{{$shapeDetails['image']}}" class="img-fluid" alt="Octagon-shape-foam-page-icon">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 col-xl-4">
                        <div class="chekc-out-box  login-modal">
                            <div class="heading-06 mb-4 d-flex align-items-center text-left">
                                <div class="step">1</div>
                                <h4 class="mb-0">Enter Measurment</h4>
                            </div>
                            <form class="mb-5 measurment-form">
                                <input type="hidden" name="slug" value="{{$shapeDetails['slug']}}">
                                @if($shapeDetails['slug']=='square' || $shapeDetails['slug']=='rectangle'  || $shapeDetails['slug']=='trinagle_wedge')
                                <input type="hidden" name="dimension" value="1">
                                <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['w']) ? $data['w']:''}}" name="width" id="Width" required="">
                                            <label for="Width" class="floating-label">Width</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }} disabled="disabled">in</option>
                                               <!--  <option value="cm" {{(!empty($data['wp']) && $data['wp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['wp']) && $data['wp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['wp']) && $data['wp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['wp']) && $data['wp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                            <!-- <div class="nice-select form-control" tabindex="0">
                                                <span class="current">in</span>
                                                <ul class="list">
                                                    <li data-value="in" class="option selected">in</li>
                                                    <li data-value="cm" class="option">cm </li>
                                                    <li data-value="mm" class="option">mm </li>
                                                    <li data-value="ft" class="option">ft </li>
                                                    <li data-value="m" class="option">m</li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['l']) ? $data['l']:''}}"  name="length"  required="">
                                            <label class="floating-label">Length</label>
                                             <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['lp']) && $data['lp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['lp']) && $data['lp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['lp']) && $data['lp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['lp']) && $data['lp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>
                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>
                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                 @if($shapeDetails['slug']=='pentagon' || $shapeDetails['slug']=='octagon'  || $shapeDetails['slug']=='bolster'  || $shapeDetails['slug']=='diamond' || $shapeDetails['slug']=='star' || $shapeDetails['slug']=='alberta' )
                                  <input type="hidden" name="dimension" value="2">
                                <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['w']) ? $data['w']:''}}" name="width" id="Width" required="">
                                            <label for="Width" class="floating-label">Width</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }} disabled="disabled">in</option>
                                               <!--  <option value="cm" {{(!empty($data['wp']) && $data['wp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['wp']) && $data['wp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['wp']) && $data['wp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['wp']) && $data['wp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                            <!-- <div class="nice-select form-control" tabindex="0">
                                                <span class="current">in</span>
                                                <ul class="list">
                                                    <li data-value="in" class="option selected">in</li>
                                                    <li data-value="cm" class="option">cm </li>
                                                    <li data-value="mm" class="option">mm </li>
                                                    <li data-value="ft" class="option">ft </li>
                                                    <li data-value="m" class="option">m</li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['l']) ? $data['l']:''}}"  name="length"  required="">
                                            <label class="floating-label">Length</label>
                                             <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['lp']) && $data['lp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['lp']) && $data['lp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['lp']) && $data['lp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['lp']) && $data['lp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>
                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">A</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>
                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                @if($shapeDetails['slug']=='triangle')
                                 <input type="hidden" name="dimension" value="3">
                                <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">A</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>
                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                @if($shapeDetails['slug']=='l' || $shapeDetails['slug']=='t')
                                 <input type="hidden" name="dimension" value="4">
                                 <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['w']) ? $data['w']:''}}" name="width" id="Width" required="">
                                            <label for="Width" class="floating-label">Width</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }} disabled="disabled">in</option>
                                               <!--  <option value="cm" {{(!empty($data['wp']) && $data['wp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['wp']) && $data['wp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['wp']) && $data['wp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['wp']) && $data['wp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                            <!-- <div class="nice-select form-control" tabindex="0">
                                                <span class="current">in</span>
                                                <ul class="list">
                                                    <li data-value="in" class="option selected">in</li>
                                                    <li data-value="cm" class="option">cm </li>
                                                    <li data-value="mm" class="option">mm </li>
                                                    <li data-value="ft" class="option">ft </li>
                                                    <li data-value="m" class="option">m</li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['l']) ? $data['l']:''}}"  name="length"  required="">
                                            <label class="floating-label">Length</label>
                                             <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['lp']) && $data['lp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['lp']) && $data['lp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['lp']) && $data['lp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['lp']) && $data['lp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>
                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">A</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">B</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                 @if($shapeDetails['slug']=='circle' || $shapeDetails['slug']=='cylinder')
                                  <input type="hidden" name="dimension" value="5">
                                 <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">R</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                @if($shapeDetails['slug']=='wedge')
                                 <input type="hidden" name="dimension" value="6">
                                <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['w']) ? $data['w']:''}}" name="width" id="Width" required="">
                                            <label for="Width" class="floating-label">Width</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }} disabled="disabled">in</option>
                                               <!--  <option value="cm" {{(!empty($data['wp']) && $data['wp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['wp']) && $data['wp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['wp']) && $data['wp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['wp']) && $data['wp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                            <!-- <div class="nice-select form-control" tabindex="0">
                                                <span class="current">in</span>
                                                <ul class="list">
                                                    <li data-value="in" class="option selected">in</li>
                                                    <li data-value="cm" class="option">cm </li>
                                                    <li data-value="mm" class="option">mm </li>
                                                    <li data-value="ft" class="option">ft </li>
                                                    <li data-value="m" class="option">m</li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['l']) ? $data['l']:''}}"  name="length"  required="">
                                            <label class="floating-label">Length</label>
                                             <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['lp']) && $data['lp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['lp']) && $data['lp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['lp']) && $data['lp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['lp']) && $data['lp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>
                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->
                                        </div>
                                    </section>
                                

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">A</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">B</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                @if($shapeDetails['slug']=='maple-leaf')
                                 <input type="hidden" name="dimension" value="7">
                                <div class="main-form row no-gutters">
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['w']) ? $data['w']:''}}" name="width" id="Width" required="">
                                            <label for="Width" class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }} disabled="disabled">in</option>
                                               <!--  <option value="cm" {{(!empty($data['wp']) && $data['wp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['wp']) && $data['wp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['wp']) && $data['wp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['wp']) && $data['wp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                            <!-- <div class="nice-select form-control" tabindex="0">
                                                <span class="current">in</span>
                                                <ul class="list">
                                                    <li data-value="in" class="option selected">in</li>
                                                    <li data-value="cm" class="option">cm </li>
                                                    <li data-value="mm" class="option">mm </li>
                                                    <li data-value="ft" class="option">ft </li>
                                                    <li data-value="m" class="option">m</li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['l']) ? $data['l']:''}}"  name="length"  required="">
                                            <label class="floating-label">B</label>
                                             <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['lp']) && $data['lp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['lp']) && $data['lp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['lp']) && $data['lp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['lp']) && $data['lp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>
                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->
                                        </div>
                                    </section>
                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">C</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">D</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">E</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">F</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">G</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">H</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">I</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">J</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                    <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">K</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>

                                     <section class="col-md-12">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" onChange="getPrice()" class="inputText" value="{{ isset($data['d']) ? $data['d']:''}}" name="depth"  required="">
                                            <label class="floating-label">Depth</label>
                                           <select class="form-control" id="exampleFormControlSelect1d" style="display: none">
                                                <option value="in" selected="selected" }}>in</option>
                                               <!--  <option value="cm" {{(!empty($data['dp']) && $data['dp']=='cm') ? 'selected="selected"':'' }}>cm </option>
                                                <option value="mm" {{(!empty($data['dp']) && $data['dp']=='mm') ? 'selected="selected"':'' }}>mm </option>
                                                <option value="ft" {{(!empty($data['dp']) && $data['dp']=='ft') ? 'selected="selected"':'' }}>ft </option>
                                                <option value="m" {{(!empty($data['dp']) && $data['dp']=='m') ? 'selected="selected"':'' }}>m</option> -->
                                            </select>

                                           <!--  <div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div> -->

                                        </div>
                                    </section>
                                   <!--  <section class="col-md-6 pr-2">
                                        <div class="form-group fix-width lable-top">
                                            <input type="text" class="inputText" id="depth" required="">
                                            <label class="floating-label">A</label>
                                            <select class="form-control" id="exampleFormControlSelect1d" style="display: none;">
                                                <option value="in">in</option>
                                                <option value="cm">cm </option>
                                                <option value="mm">mm </option>
                                                <option value="ft">ft </option>
                                                <option value="m">m</option>
                                            </select><div class="nice-select form-control" tabindex="0"><span class="current">in</span><ul class="list"><li data-value="in" class="option selected">in</li><li data-value="cm" class="option">cm </li><li data-value="mm" class="option">mm </li><li data-value="ft" class="option">ft </li><li data-value="m" class="option">m</li></ul></div>
                                        </div>
                                    </section> -->
                                </div>
                                @endif

                                <!-- end main-form row -->
                            </form>
                         
                            <div class="select-firmness mb-5">
                                <div class="heading-06  d-flex align-items-center text-left mb-4">
                                    <div class="step">2</div>
                                    <h4 class="mb-0">Select Firmness</h4>
                                   
                                </div>
                                <ul class="d-flex justify-content-between nav nav-pills main-tab-menu btn-group btn-group-toggle" id="pills-tab" role="tablist">
                                    @foreach($products as $key => $product)
                                    <label class="btn btn-secondary {{(!empty($data['pid']) && $data['pid']== $product->id) ? 'active':'' }}" id="product_{{$product->id}}">
                                       <input type="radio" onChange="showDensity({{$product->id}})" name="product_id" value="{{$product->id}}" id="option1_{{$product->name}}" autocomplete="off" {{(!empty($data['pid']) && $data['pid']== $product->id) ? 'active':'' }}> {{$product->name}}
                                    </label>
                                   <!--  <input type="radio" name="product_id" class="nav-link text-uppercase" id="option1_{{$product->name}}" onchange="removeItemsbanner()" autocomplete="off" > 
{{(!empty($data['pid']) && $data['pid']== $product->id) ? 'active':'' }} -->
                                      <!--   <a class="nav-link text-uppercase {{(!empty($data['pid']) && $data['pid']== $product->id) ? 'active':'' }}" id="pills-home-tab" data-toggle="pill" href="#pills-home_{{$product->id}}" role="tab" aria-controls="pills-home" aria-selected="true">{{$product->name}}</a> 
                                    </li>-->
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    @foreach($products as $product)
                                    <div class="tab-pane fade {{(!empty($data['pid']) && $data['pid']== $product->id) ? 'active show':'' }}" id="pills-home_{{$product->id}}" role="tabpanel" aria-labelledby="pills-home-tab">

                                        <ul class="btn-group btn-group-toggle nav nav-pills" id="pills_tab1_{{$product->id}}" role="tablist" style="margin-top: 42px;">
                                            @foreach($product->densities as $density)

                                            <label class="btn btn-secondary {{count($data['firm_ids'])>0 && in_array($density->id, $data['firm_ids']) ? 'active':'' }}" id="density_{{$product->id}}_{{$density->id}}">
                            <input type="radio" value="{{$density->id}}" onChange="selectDensity({{$product->id}},{{$density->id}})" class="nav-link" name="density_id">{{$density->name}}
                                                </label>


                                               <!--  <li class="nav-item">
                                                    <a class="nav-link {{count($data['firm_ids'])>0 && in_array($density->id, $data['firm_ids']) ? 'active':'' }}" id="pills-home-tab1" data-toggle="pill" href="#pills-home1" role="tab" aria-controls="pills-home" aria-selected="true">{{$density->name}}
                                                     </a>
                                                </li>
                                                     -->
                                                 

                                                   
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                           
                            <div class="heading-06 mb-4 d-flex align-items-center text-left">
                                <div class="step">3</div><h4 class="mb-0">Deliver To</h4>
                                
                            </div>
                            <div class="cover-total title-section font-roboto delivery-action row">
                                <div class="col-sm-6">
                                    <div class="form-group fix-width lable-top">
                                        <select class="form-control wful" id="delivery" style="display: none;">
                                            <option value="d">Deliver</option>
                                            <option value="p">Pickup </option>
                                        </select><div class="nice-select form-control wful" tabindex="0"><span class="current">Deliver</span><ul class="list"><li data-value="d" class="option selected">Deliver</li><li data-value="p" class="option">Pickup </li></ul></div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6 pl-0">
                                    <div class="dropdown text-left">
                                    
                                        <div class="form-group fix-width delivery  p-0" id="">
                                        <div id="textbox">
                                        <input class="pt-0" type="text" placeholder=" M3C 0C1 " onfocus="this.placeholder = ''" onblur="this.placeholder = 'M3C 0C1'" id="deliverypin">
                                        <a href="#" class="chake-locat"> Check</a>
                                        </div>
                                        
                                        <div id="longtext" style="display: none;"><p class="delivery-address"> 11620 178 St NW, Edmonton, AB T5S 2E6 Canada</p></div>
                                       </div>
                                       
                                    <!--<div class="form-group fix-width delivery  p-0" id="">
                                        <input type="hidden" value="11620 178 St NW, Edmonton, AB T5S 2E6 Canada" id="address"/>
                                    </div>-->
                                    
                                    
                                    
                                    
                                      <!--<span class="delivery-address">11620 178 St NW, Edmonton, AB T5S 2E6 Canada</span>  -->
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="cover-total subtotal  d-flex">
                                <h3>Subtotal</h3>
                                <h3 class="ml-auto" id="subtotal_prize">$ {{$price['price']}}</h3>
                            </div>
                            <div class="cover-total subtotal pb-0 d-flex">
                                <h3>+{{\Config::get('data.gst')}}% GST</h3>
                                <h3 class="ml-auto" id="gst">$ {{$price['gst']}}</h3>
                            </div>
                            <hr>
                            <div class="cover-total total d-flex align-items-center justify-content-between total">
                                <h5 class="mb-0">Total</h5>
                                <h2 class="mb-0" id="totalprice">$ {{$price['totalprice']}}</h2>
                            </div>
                            <div>
                                <a href="#" class="btn btn-01 w-100 font-roboto" onclick="addShapeToCart();">Add to Cart</a>
                            </div>
                            <!--<div class="para-1-dropdown mt-2 text-center font-roboto">
                                <span>OR</span>
                            </div>
                            <div class="p-15 bt-paypal mt-2">
                                <a href="#" class="btn btn-01 w-100 font-roboto">
                                    <img src="assets/images/paypal.png" alt="paypal">
                                </a>
                            </div>
                            <div class="p-15 mt-3">
                                <img src="assets/images/payment-opt-paypal.png" class="mw-100 m-auto d-block" alt="paypal">
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        //const apiUrl = 'http://localhost:8888/ecommerce_kapil/Api/v1/'; 
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        function showDensity(pid){
            console.log(pid);
            $('#pills-tab label').removeClass('active');
            $('#product_'+pid).addClass('active');
            $('#pills-tabContent div').removeClass('active show')
            $('#pills-home_'+pid).addClass('active show');

            //console.log(pid);
        }

        function selectDensity(pid,did){
            $('#pills_tab1_'+pid+' label').removeClass('active');
            $('#density_'+pid+'_'+did).addClass('active');
            getPrice();
        }

        function getPrice(){
            var product_id = $('input[name="product_id"]:checked').val();
            //console.log(product_id);
            var width = $('input[name="width"]').val();
            var length = $('input[name="length"]').val();
            var depth = $('input[name="depth"]').val();
            var firm_ids = $('input[name="density_id"]:checked').val();
            var oitem_ids = getUrlParameter('oitem_ids');

            // console.log(oitem_ids);
            // console.log(firm_ids);
            // console.log('>>>>>>>>>>>>>>>>>');
            //return 0;
            // console.log(product_id+' '+width+' '+length+' '+depth);
            $.ajax({url: apiUrl+'product.price.get?pid='+product_id+'&w='+width+'&l='+length+'&d='+depth+'&oitem_ids='+oitem_ids+'&firm_ids='+firm_ids, success: function(result){
                console.log(result);
                if(result.status){
                    $('#subtotal_prize').text('$ '+result.data.price);
                    $('#gst').text('$ '+result.data.gst);
                    $('#totalprice').text('$ '+result.data.totalprice);

                }

            }});






        }

        function addShapeToCart()
        {
            var product_id = $('input[name="product_id"]:checked').val();
            //console.log(product_id);
            var width = $('input[name="width"]').val();
            var length = $('input[name="length"]').val();
            var depth = $('input[name="depth"]').val();
            var firm_ids = $('input[name="density_id"]:checked').val();
            var oitem_ids = getUrlParameter('oitem_ids');
            var shapeId=$('input[name="dimension"]').val();
            var slug=$('input[name="slug"]').val();

            $.ajax({
                url: apiUrl+'addShapeToCart?pid='+product_id+'&w='+width+'&l='+length+'&d='+depth+'&oitem_ids='+oitem_ids+'&firm_ids='+firm_ids+'&shapeId='+shapeId+'&slug='+slug,
                  dataType:'json',
                success: function(result){
                if(result.success=='1'){
                 //alert();
                 window.location.href=location.protocol + '//' + location.host+'/checkout';
                }

            }});
        }



    </script>

@stop