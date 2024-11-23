import React, { useContext } from "react";
import { Link } from "react-router-dom";
import { AppContext } from "../providers/AppProvider";
import ContactModal from "./modals/ContactModal";

export default function Header() {
  const { logOut, user } = useContext(AppContext);
  return (
    <>
      <header className="header-section section sticker">
        <div className="container">
          <div className="row justify-content-between">
            <div className="col-auto">
              <div className="header-logo">
                <Link to="/">
                  <img src="/template/outside/img/logo.png" alt="main logo" />
                </Link>
              </div>
            </div>
            <div className="col-auto d-flex">
              <nav className="main-menu">
                <ul>
                  <li>
                    <Link to="/">Home</Link>{" "}
                  </li>
                  {user ? (
                    <>
                      <li>
                        <Link to="/orders">Orders</Link>
                      </li>
                      <li>
                        <a href="#" onClick={(e) => logOut(e)}>
                          LogOut
                        </a>{" "}
                      </li>
                    </>
                  ) : (
                    <li>
                      <a href="/login-google">Login With Google</a>{" "}
                    </li>
                  )}

                  <li>
                    <a
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target={`#quickViewModalContact`}
                    >
                      Contact
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <div className="mobile-menu"></div>
          </div>
        </div>
      </header>
      <ContactModal />
    </>
  );
}
