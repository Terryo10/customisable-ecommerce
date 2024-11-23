import axios from "axios";
let data_res = {
  status: 200,
  message: "data send",
};
let headers = {
  headers: {
    "content-type": "multipart/form-data",
  },
};

export const apiDataPost = async (url, data) => {
  try {
    await axios.post(url, data).then((res) => {
      data_res = res.data;
    });
  } catch (err) {
    data_res = err;
  }
  return data_res;
};
export const apiDataPostForm = async (url, data) => {
  try {
    await axios.post(url, data, headers).then((res) => {
      data_res = res.data;
    });
  } catch (err) {
    data_res = err;
  }
  return data_res;
};
export const apiDataGet = async (url, data, token) => {
  try {
    await axios
      .get(url, data, { headers: { Authorization: `Bearer ${token}` } })
      .then((res) => {
        data_res = res.data;
        return data_res;
      });
  } catch (e) {
    data_res = { status: 505, message: e, type: "failed_to_fetch" };
  }
  return data_res;
};

export const apiDataGetChat = async (url, data, token) => {
  try {
    const response = await axios.get(url, {
      headers: { Authorization: `Bearer ${token}` },
      data: data,
    });
    return response.data;
  } catch (error) {
    console.log("Error:", error);
    throw error;
  }
};

export const apiDataPut = async (url, data) => {
  try {
    await axios.put(url, data, headers).then((res) => {
      data_res = res.data;
      return data_res;
    });
  } catch (e) {
    data_res = e;
  }
  return data_res;
};
export const apiDataPatch = async (url, data) => {
  try {
    await axios.patch(url, data, headers).then((res) => {
      data_res = res.data;
      return data_res;
    });
  } catch (e) {
    data_res = e;
  }
  return data_res;
};

export const apiDataDelete = async (url, data) => {
  try {
    await axios.delete(url, data).then((res) => {
      data_res = res.data;
      return data_res;
    });
  } catch (e) {
    data_res = e;
  }
  return data_res;
};
