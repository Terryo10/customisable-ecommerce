import React, { createContext, useEffect, useState } from "react";
import useLocalStorage from "@/services/useLocalStorage";
import { useNavigate } from "react-router-dom";
import {
  apiDataGet,
  apiDataPost,
  apiDataPostForm,
  apiDataPut,
} from "../repository/base_repository";
import axios from "axios";
import swal from "sweetalert";

export const AppContext = createContext(() => {});
export default function AppProvider({ children }) {
  const [user, setUser] = useLocalStorage("user", false);
  const [paramId, setParamId] = useState(0);
  const [sliders, setSliders] = useState([]);
  const [products, setProducts] = useState([]);
  const [token, setToken] = useLocalStorage("token", null);
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleSearch = (e) => {
    setSearchValue(e.target.value);
    navigate(`/search?q=${e.target.value}`);
  };
  useEffect(() => {
    //update app sanctum token if user got token
    if (!token) return;
    axios.interceptors.request.use(function (config) {
      config.headers.Authorization = token ? `Bearer ${token}` : "";
      return config;
    });
  }, [token]);

  useEffect(() => {
    if (!token) return;
    async function fetchData() {
      let response = await apiDataGet("/api/v1/check-user", {});
      if (response?.user) {
        setUser(response?.user);
      } else {
        swal("Error", response?.message, "error");
      }
    }
    fetchData();
  }, [token]);

  useEffect(() => {
    async function fetchData() {
      let response = await apiDataGet("/api/v1/sliders", {});
      if (response?.sliders) {
        setSliders(response?.sliders);
      } else {
        swal("Error", response?.message, "error");
      }
    }
    fetchData();
  }, []);

  useEffect(() => {
    async function fetchData() {
      setLoading(true);
      let response = await apiDataGet("/api/v1/products", {});
      if (response?.products) {
        setProducts(response?.products);
      } else {
        swal("Error", response?.message, "error");
      }
      setLoading(false);
    }
    fetchData();
  }, []);

  useEffect(() => {
    if (window.location.pathname.toString().includes("/home/")) {
      const url = window.location.pathname;
      const param_id = url.substring(url.lastIndexOf("/") + 1);

      setParamId(param_id);
      setToken(param_id);
    }
  }, [navigate]);

  const logOut = () => {
    setToken(false);
    setUser(false);
  };
  useEffect(() => {}, []);

  useEffect(() => {
    // List of scripts to dynamically load
    const scripts = [
      "/template/outside/js/vendor/jquery-3.6.0.min.js",
      "/template/outside/js/vendor/jquery-migrate.min.js",
      "/template/outside/js/bootstrap.bundle.min.js",
      "/template/outside/js/plugins.js",
      "/template/outside/js/ajax-mail.js",
      "/template/outside/js/main.js",
      "js/vendor/modernizr-2.8.3.min.js",
    ];

    // Function to load scripts dynamically
    scripts.forEach((src) => {
      const script = document.createElement("script");
      script.src = src;
      // script.async = true; // Ensure non-blocking
      document.body.appendChild(script);
    });

    return () => {
      // Cleanup: remove scripts when the component unmounts
      scripts.forEach((src) => {
        const scriptElements = document.querySelectorAll(
          `script[src="${src}"]`
        );
        scriptElements.forEach((el) => el.remove());
      });
    };
  }, [products, sliders, navigate]);

  const values = {
    navigate,
    user,
    logOut,
    token,
    products,
    sliders,
    loading,
  };
  return <AppContext.Provider value={values}>{children}</AppContext.Provider>;
}
