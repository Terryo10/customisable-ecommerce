import React from "react";
import { Link } from "react-router-dom";
import { AppContext } from "../providers/AppProvider";
import Header from "../components/Header";
import TopFooter from "../components/TopFooter";
import Footer from "../components/Footer";
import Slider from "../components/Slider";
import { jsonStringParser } from "../services/json_parser";
export default function Home() {
  const { user, products, loading, token } = React.useContext(AppContext);
  return (
    <>
      <Header />
      <Slider />

      <div className="product-section section pt-120 pb-120">
        <div className="container">
          <div className="row justify-content-between">
            <div className="isotope-product-filter col-auto">
              <button className="active" data-filter="*">
                all
              </button>
            </div>
          </div>

          <div
            className="isotope-grid row"
            style={{ height: "40vh !important" }}
            id="shop"
          >
            {products?.data?.map((product, i) => {
              return (
                <>
                  <div className="col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                    <div className="product-item text-center">
                      <div className="product-img">
                        <a className="image" href="#">
                          <img
                            style={{ height: "200px !important" }}
                            src={`/storage/${product?.feature_image}`}
                            alt=""
                          />
                        </a>

                        <a className="wishlist" href="#" title="Wishlist">
                          <i className="pe-7s-like"></i>
                        </a>

                        <div className="action-btn fix">
                          <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target={`#quickViewModal${product?.id}`}
                          >
                            <i className="pe-7s-look"></i>Quick view
                          </a>
                        </div>
                      </div>

                      <div className="product-info text-left">
                        <h5 className="title">{product?.name ?? ""}</h5>

                        <div className="price-ratting fix">
                          <span className="price float-start">
                            <span className="new">${product?.price}</span>
                          </span>
                          <span className="ratting float-end">
                            <i className="fa fa-star active"></i>
                            <i className="fa fa-star active"></i>
                            <i className="fa fa-star active"></i>
                            <i className="fa fa-star active"></i>
                            <i className="fa fa-star active"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div classNameName="block relative">
                      <div
                        className="modal fade"
                        id={`quickViewModal${product?.id}`}
                        tabindex="-1"
                      >
                        <div className="modal-dialog modal-dialog-centered">
                          <div className="modal-content">
                            <div className="modal-header">
                              <button
                                type="button"
                                className="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div className="modal-body">
                              <div className="row">
                                <div className="col-xl-5 col-md-6 col-12 mb-40">
                                  <div className="tab-content mb-10">
                                    <div
                                      className="pro-large-img tab-pane active"
                                      id="pro-large-img-1"
                                    >
                                      <img
                                        src={`/storage/${product?.feature_image}`}
                                        alt=""
                                      />
                                    </div>
                                    {product?.images?.map((img) => (
                                      <div
                                        className="pro-large-img tab-pane"
                                        id="pro-large-img-2"
                                      >
                                        <img src={`/storage/${img}`} alt="" />
                                      </div>
                                    ))}
                                  </div>

                                  <div className="pro-thumb-img-slider nav">
                                    {product?.images?.map((img) => (
                                      <div>
                                        <a
                                          href="#pro-large-img-1"
                                          className="active"
                                          data-bs-toggle="tab"
                                        >
                                          <img src={`/storage/${img}`} alt="" />
                                        </a>
                                      </div>
                                    ))}
                                  </div>
                                </div>

                                <div className="col-xl-7 col-md-6 col-12 mb-40">
                                  <div className="product-details section">
                                    <h1 className="title">{product?.name}</h1>

                                    <div className="price-ratting section d-flex flex-column flex-sm-row justify-content-between">
                                      <span className="price">
                                        <span className="new">
                                          $ {product?.price}
                                        </span>
                                      </span>

                                      <span className="ratting">
                                        <i className="fa fa-star active"></i>
                                        <i className="fa fa-star active"></i>
                                        <i className="fa fa-star active"></i>
                                        <i className="fa fa-star active"></i>
                                        <i className="fa fa-star active"></i>
                                        <span> (01 Customer Review)</span>
                                      </span>
                                    </div>

                                    <div className="short-desc section">
                                      <h5 className="pd-sub-title">
                                        Quick Overview
                                      </h5>
                                      <p>{product?.description}</p>
                                    </div>
                                    {product?.fields?.map((field) => {
                                      return (
                                        <>
                                          {JSON.parse(
                                            JSON.parse(
                                              JSON.parse(JSON.stringify(field))
                                                ?.fields
                                            )
                                          )?.map((fild) => (
                                            <div className="short-desc section">
                                              <h5 className="pd-sub-title">
                                                <>{fild?.name}</>
                                              </h5>
                                              <p>
                                                <input
                                                  type="text"
                                                  name={fild?.value}
                                                  className="addedFields form-control"
                                                  required
                                                />
                                              </p>
                                            </div>
                                          ))}
                                        </>
                                      );
                                    })}

                                    <label>Quantity</label>
                                    <div className="quantity-cart section">
                                      <div className="product-quantity">
                                        <input type="text" value="0" />
                                      </div>
                                      <button className="add-to-cart">
                                        Place Order
                                      </button>
                                    </div>

                                    <ul className="usefull-link section">
                                      <li>
                                        <a href="#">
                                          <i className="pe-7s-mail"></i> Email
                                          to a Friend
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i className="pe-7s-like"></i>{" "}
                                          Wishlist
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i className="pe-7s-print"></i> print
                                        </a>
                                      </li>
                                    </ul>

                                    <div className="share-icons section">
                                      <span>share :</span>
                                      <a href="#">
                                        <i className="fa fa-facebook"></i>
                                      </a>
                                      <a href="#">
                                        <i className="fa fa-twitter"></i>
                                      </a>
                                      <a href="#">
                                        <i className="fa fa-instagram"></i>
                                      </a>
                                      <a href="#">
                                        <i className="fa fa-pinterest"></i>
                                      </a>
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
                </>
              );
            })}
          </div>

          <div className="row">
            <div className="text-center col-12 mt-30">
              <a href="#" className="btn load-more-product">
                Add Pagination Here
              </a>
            </div>
          </div>
        </div>
      </div>

      <TopFooter />
      <Footer />
    </>
  );
}
