@extends('layouts.main')
@section('content')

    <!-- ============ Body content start ============= -->
    <div class="main-content">
      <div class="breadcrumb">
        <h1 class="me-2">Version 3</h1>
        <ul>
          <li><a href="">Dashboard</a></li>
          <li>Version 3</li>
        </ul>
      </div>
      <div class="separator-breadcrumb border-top"></div>
      <div class="row">
        <!-- no 13 chart-->
        <div class="col-md-3 col-lg-3">
          <div class="card mb-4 o-hidden">
            <div class="card-body">
              <div class="ul-widget__row-v2">
                <div id="chart13"></div>
                <div class="ul-widget__content-v2">
                  <h4 class="heading mt-3">698 212</h4>
                  <small class="text-muted m-0">50% Average</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- no 14 chart-->
        <div class="col-md-3 col-lg-3">
          <div class="card mb-4 o-hidden">
            <div class="card-body">
              <div class="ul-widget__row-v2">
                <div id="chart14"></div>
                <div class="ul-widget__content-v2">
                  <h4 class="heading mt-3">369 212</h4>
                  <small class="text-muted m-0">24% Average</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- no 15 chart-->
        <div class="col-md-3 col-lg-3">
          <div class="card mb-4 o-hidden">
            <div class="card-body">
              <div class="ul-widget__row-v2">
                <div id="chart15"></div>
                <div class="ul-widget__content-v2">
                  <h4 class="heading mt-3">369 212</h4>
                  <small class="text-muted m-0">24% Average</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- no 16 chart-->
        <div class="col-md-3 col-lg-3">
          <div class="card mb-4 o-hidden">
            <div class="card-body">
              <div class="ul-widget__row-v2">
                <div id="chart16"></div>
                <div class="ul-widget__content-v2">
                  <h4 class="heading mt-3">369 212</h4>
                  <small class="text-muted m-0">24% Average</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- left-side-->
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="card-title m-0">Network Stats</div>
                  <p class="text-small text-muted">
                    Lorem ipsum dolor sit amet consectetur.
                  </p>
                  <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                      <div
                        class="p-4 rounded d-flex align-items-center bg-primary text-white"
                      >
                        <i class="i-Data-Backup text-32 me-3"></i>
                        <div>
                          <h4 class="text-18 mb-1 text-white">Backups</h4>
                          <span>Total: 32</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                      <div
                        class="p-4 rounded d-flex align-items-center bg-primary text-white"
                      >
                        <i class="i-Big-Data text-32 me-3"></i>
                        <div>
                          <h4 class="text-18 mb-1 text-white">Databases</h4>
                          <span>Total: 302</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                      <div
                        class="p-4 border border-light rounded d-flex align-items-center"
                      >
                        <i class="i-Data-Cloud text-32 me-3"></i>
                        <div>
                          <h4 class="text-18 mb-1">Space used</h4>
                          <span>Total: 160GB</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4">
                      <div
                        class="p-4 border border-light rounded d-flex align-items-center"
                      >
                        <i class="i-Data-Download text-32 me-3"></i>
                        <div>
                          <h4 class="text-18 mb-1">Downloaded</h4>
                          <span>Total: 30GB</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-profile-1 mb-4">
                <div class="card-body text-center">
                  <div class="avatar box-shadow-2 mb-3">
                    <img
                      src="../../dist-assets/images/faces/16.jpg"
                      alt=""
                    />
                  </div>
                  <h5 class="m-0">Jassica Hike</h5>
                  <p class="mt-0 text-muted">UI/UX Designer</p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Recusandae cumque.
                  </p>
                  <button class="btn btn-primary btn-rounded">
                    Contact Jassica
                  </button>
                  <div class="card-socials-simple mt-4">
                    <a href=""><i class="i-Linkedin-2"></i></a
                    ><a href=""><i class="i-Facebook-2"></i></a
                    ><a href=""><i class="i-Twitter"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-profile-1 mb-4">
                <div class="card-body text-center">
                  <div class="avatar box-shadow-2 mb-3">
                    <img
                      src="../../dist-assets/images/faces/2.jpg"
                      alt=""
                    />
                  </div>
                  <h5 class="m-0">James Hike</h5>
                  <p class="mt-0 text-muted">VR Developer</p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Recusandae cumque.
                  </p>
                  <button class="btn btn-primary btn-rounded">
                    Contact James
                  </button>
                  <div class="card-socials-simple mt-4">
                    <a href=""><i class="i-Linkedin-2"></i></a
                    ><a href=""><i class="i-Facebook-2"></i></a
                    ><a href=""><i class="i-Twitter"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-ecommerce-3 o-hidden mb-4">
                <div class="d-flex flex-column flex-sm-row">
                  <div>
                    <img
                      class="card-img-left"
                      src="../../dist-assets/images/photo-wide-1.jpg"
                      alt=""
                    />
                  </div>
                  <div class="flex-grow-1 p-4">
                    <h5 class="m-0">Product featured</h5>
                    <p class="m-0 text-small text-muted">By ABC Cafe</p>
                    <p class="m-0">
                      $40
                      <del>$55</del>
                    </p>
                    <p class="text-muted mt-3">
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Nesciunt placeat esse tempore debitis.
                    </p>
                    <div class="actions">
                      <button
                        class="btn btn-sm rounded-circle btn-icon btn-outline-primary"
                      >
                        <i class="icon i-Add-Cart"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-ecommerce-3 o-hidden mb-4">
                <div class="d-flex flex-column flex-sm-row">
                  <div>
                    <img
                      class="card-img-left"
                      src="../../dist-assets/images/photo-wide-2.jpg"
                      alt=""
                    />
                  </div>
                  <div class="flex-grow-1 p-4">
                    <h5 class="m-0">Product featured</h5>
                    <p class="m-0 text-small text-muted">By Apple</p>
                    <p class="m-0">
                      $40
                      <del>$55</del>
                    </p>
                    <p class="text-muted mt-3">
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Nesciunt placeat esse tempore debitis.
                    </p>
                    <div class="actions">
                      <button
                        class="btn btn-sm rounded-circle btn-icon btn-outline-primary"
                      >
                        <i class="icon i-Add-Cart"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="ul-widget__head">
                    <div class="ul-widget__head-label">
                      <h3 class="ul-widget__head-title">
                        Recent Notifications
                      </h3>
                    </div>
                    <div class="ul-widget__head-toolbar">
                      <ul
                        class="nav nav-tabs nav-tabs-line nav-tabs-bold ul-widget-nav-tabs-line"
                        role="tablist"
                      >
                        <li class="nav-item">
                          <a
                            class="nav-link active show"
                            data-bs-toggle="tab"
                            href="#__g-widget-s7-tab1-content"
                            role="tab"
                            aria-selected="true"
                            >Today</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            data-bs-toggle="tab"
                            href="#__g-widget-s7-tab2-content"
                            role="tab"
                            aria-selected="false"
                            >Month</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="ul-widget__body">
                    <div class="tab-content">
                      <div
                        class="tab-pane active show"
                        id="__g-widget-s7-tab1-content"
                      >
                        <div class="ul-widget-s7n">
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >10:00</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-primary"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >08:00</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-success"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >13:00</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-danger"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >05:30</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-warning"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="__g-widget-s7-tab2-content">
                        <div class="ul-widget-s7n">
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >12:00</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-danger"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >08:00</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-info"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items mb-4">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >04:30</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-warning"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                          <div class="ul-widget-s7__items">
                            <span class="ul-widget-s7__item-time ul-middle"
                              >05:30</span
                            >
                            <div class="ul-widget-s7__item-circle">
                              <p class="ul-vertical-line bg-dark"></p>
                            </div>
                            <div class="ul-widget-s7__item-text">
                              Lorem ipsum dolor sit amit,consectetur eiusmdd
                              tempor<br />
                              incididunt ut labore et dolore magna
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- right-side-->
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="card-title">Basic Column chart</div>
                  <div id="basicColumn-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-xl-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">Payment For;A;S m #01</div>
                  <div class="ul-widget-list__payment-method mb-3">
                    <img
                      src="../../dist-assets/images/master-card.png"
                      style="width: 50px"
                      alt=""
                      srcset=""
                    /><img
                      src="../../dist-assets/images/visa.png"
                      style="width: 50px"
                      alt=""
                      srcset=""
                    /><img
                      src="../../dist-assets/images/paypal.png"
                      style="width: 50px"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <p
                    class="alert alert-dismissible fade show alert-success"
                  >
                    Some text success or error
                  </p>
                  <div class="ul-widget__payment-form">
                    <form action="">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label class="ul-form__label" for="inputEmail4">
                              Full Name:
                            </label>
                            <div class="input-group mb-3">
                              <span
                                class="input-group-text"
                                id="basic-addon1"
                                ><i class="i-Male-21 text-18"></i
                              ></span>
                              <input
                                class="form-control"
                                type="text"
                                placeholder=""
                                aria-label="Username"
                                aria-describedby="basic-addon1"
                              />
                            </div>
                            <small
                              class="ul-form__text form-text"
                              id="passwordHelpBlock"
                              >Some help content goes here</small
                            >
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label class="ul-form__label" for="inputEmail4">
                              Card Number:
                            </label>
                            <div class="input-group mb-3">
                              <span
                                class="input-group-text"
                                id="basic-addon1"
                                ><i class="i-Credit-Card-2 text-18"></i
                              ></span>
                              <input
                                class="form-control"
                                type="text"
                                placeholder=""
                                aria-label="Username"
                                aria-describedby="basic-addon1"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-8">
                            <label><span>Expiration</span></label>
                            <div class="input-group align-items-center">
                              <select
                                class="form-control"
                                style="width: 45%"
                              >
                                <option>Month</option>
                                <option>01 - Janiary</option>
                                <option>02 - February</option>
                                <option>03 - February</option>
                                <option>04 - march</option></select
                              ><span class="text-center" style="width: 10%"
                                >/</span
                              >
                              <select
                                class="form-control"
                                style="width: 45%"
                              >
                                <option>Year</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <label
                              class="font-weight-700 text-dark"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title=""
                              data-original-title="6 digits code on back side of the card"
                              >CVV</label
                            >
                            <input
                              class="form-control"
                              required=""
                              type="text"
                            />
                          </div>
                        </div>
                        <button
                          class="btn btn-primary w-100 mb-3 mt-3"
                          type="button"
                        >
                          Confirm
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--
            <div class="col-md-6 col-sm-6">
            <div class="card bg-dark text-white o-hidden mb-4">
            <img class="card-img" src="../../dist-assets/images/photo-long-1.jpg" alt="Card image">
            <div class="card-img-overlay">
            <div class="text-center pt-4">
            <h5 class="card-title mb-2 text-white">Card title</h5>
            <div class="separator border-top mb-2"></div>
            <p class="text-small font-italic">Last updated 3 mins ago</p>
            </div>
            <div class="p-1 text-left card-footer font-weight-light d-flex">
            <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
            12 </span>
            <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
            </div>
            </div>
            </div>
            </div>
            -->
            <!--
            <div class="col-md-6 col-sm-6">
            <div class="card bg-dark text-white o-hidden mb-4">
            <img class="card-img" src="../../dist-assets/images/photo-long-2.jpg" alt="Card image">
            <div class="card-img-overlay">
            <div class="text-center pt-4">
            <h5 class="card-title mb-2 text-white">Card title</h5>
            <div class="separator border-top mb-2"></div>
            <p class="text-small font-italic">Last updated 3 mins ago</p>
            </div>
            <div class="p-1 text-left card-footer font-weight-light d-flex">
            <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
            12 </span>
            <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
            </div>
            </div>
            </div>
            </div>
            -->
            <div class="col-md-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h6 class="mb-2 text-muted">Project Completion Rate</h6>
                  <p class="text-22 font-weight-light mb-1">
                    <i class="i-Up text-success"></i> 15%
                  </p>
                  <div id="echart9" style="height: 60px"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h6 class="mb-2 text-muted">Project Completion Rate</h6>
                  <p class="text-22 font-weight-light mb-1">
                    <i class="i-Down text-danger"></i> 15%
                  </p>
                  <div id="echart10" style="height: 60px"></div>
                </div>
              </div>
            </div>
            <div class="mt-3 mb-4 col-lg-12 col-xl-12">
              <div class="card text-center border-primary">
                <!-- -->
                <div class="card-header bg-primary text-white">
                  <div>Developers</div>
                </div>
                <div class="card-body">
                  <!-- -->
                  <!-- -->
                  <div class="ul-widget5">
                    <div class="ul-widget-s5__item mb-5">
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__pic">
                          <img
                            id="userDropdown"
                            src="../../dist-assets/images/faces/1.jpg"
                            alt=""
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          />
                        </div>
                        <div class="ul-widget-s5__section">
                          <a class="ul-widget4__title" href="#"
                            >Great Logo Designn</a
                          >
                          <p class="ul-widget-s5__desc">
                            UI LIb admin themes.
                          </p>
                        </div>
                      </div>
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__progress">
                          <div class="ul-widget-s5__stats">
                            <span>50%</span><span>London</span>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                              role="progressbar"
                              aria-valuemin="0"
                              aria-valuemax="100"
                              aria-valuenow="25"
                              style="width: 25%"
                            >
                              25
                            </div>
                          </div>
                        </div>
                        <button
                          class="btn btn-outline-primary"
                          type="button"
                        >
                          Follow
                        </button>
                      </div>
                    </div>
                    <div class="ul-widget-s5__item mb-5">
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__pic">
                          <img
                            id="userDropdown"
                            src="../../dist-assets/images/faces/2.jpg"
                            alt=""
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          />
                        </div>
                        <div class="ul-widget-s5__section">
                          <a class="ul-widget4__title" href="#"
                            >Great Logo Designn</a
                          >
                          <p class="ul-widget-s5__desc">
                            UI LIb admin themes.
                          </p>
                        </div>
                      </div>
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__progress">
                          <div class="ul-widget-s5__stats">
                            <span>75%</span><span>U.S</span>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                              role="progressbar"
                              aria-valuemin="0"
                              aria-valuemax="100"
                              aria-valuenow="75"
                              style="width: 75%"
                            >
                              75
                            </div>
                          </div>
                        </div>
                        <button
                          class="btn btn-outline-success"
                          type="button"
                        >
                          Follow
                        </button>
                      </div>
                    </div>
                    <div class="ul-widget-s5__item mb-5">
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__pic">
                          <img
                            id="userDropdown"
                            src="../../dist-assets/images/faces/3.jpg"
                            alt=""
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          />
                        </div>
                        <div class="ul-widget-s5__section">
                          <a class="ul-widget4__title" href="#"
                            >Frontend Developer</a
                          >
                          <p class="ul-widget-s5__desc">
                            UI LIb admin themes.
                          </p>
                        </div>
                      </div>
                      <div class="ul-widget-s5__content">
                        <div class="ul-widget-s5__progress">
                          <div class="ul-widget-s5__stats">
                            <span>30%</span><span>Finland</span>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                              role="progressbar"
                              aria-valuemin="0"
                              aria-valuemax="100"
                              aria-valuenow="30"
                              style="width: 30%"
                            >
                              30
                            </div>
                          </div>
                        </div>
                        <button
                          class="btn btn-outline-danger"
                          type="button"
                        >
                          Follow
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- -->
                <!-- -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of main-content -->
    </div>
  
 
@endsection