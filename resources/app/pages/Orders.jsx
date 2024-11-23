import React from "react";
import Header from "../components/Header";
import TopFooter from "../components/TopFooter";
import Footer from "../components/Footer";
import HeaderSection from "../components/HeaderSection";

export default function Orders() {
  return (
    <div>
      <Header />
      <HeaderSection title={"Orders"} />
      <div className="page-section section pt-120 pb-80">
        <div className="container">
          <div className="row">
            <form action="#">
              <div className="col-xs-12">
                <div className="wishlist-table table-responsive mb-40">
                  <table>
                    <thead>
                      <tr>
                        <th className="pro-remove">Remove</th>
                        <th className="pro-thumbnail">Image</th>
                        <th className="pro-title">Product</th>
                        <th className="pro-price">Unit Price</th>
                        <th className="pro-stock-stauts">Order Stauts</th>
                        <th className="pro-add-to-cart">Added Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td className="pro-remove">
                          <a href="#">×</a>
                        </td>
                        <td className="pro-thumbnail">
                          <a href="#">
                            <img src="img/product/2.jpg" alt="" />
                          </a>
                        </td>
                        <td className="pro-title">
                          <a href="#">DSR Eiffel chair</a>
                        </td>
                        <td className="pro-price">
                          <span className="amount">$137.00</span>
                        </td>
                        <td className="pro-stock-stauts">
                          <span className="out-stock">out stock</span>
                        </td>
                        <td className="pro-add-to-cart">
                          <a href="#" className="add-to-cart">
                            add to cart
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <TopFooter />
      <Footer />
    </div>
  );
}
