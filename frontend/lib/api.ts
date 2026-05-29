import { NextRequest } from "next/server";
import axios, { AxiosRequestConfig } from "axios";

const API_URL = "http://localhost:8000/api/v1";

export async function proxyRequest(req: NextRequest, config: AxiosRequestConfig) {
  const token = req.cookies.get("auth_token")?.value;

  const headers = {
    ...config.headers,
    Authorization: token ? `Bearer ${token}` : "",
    "Content-Type": "application/json",
  };

  try {
    const response = await axios({
      ...config,
      url: `${API_URL}${config.url}`,
      headers,
    });
    return response;
  } catch (error) {
    if (axios.isAxiosError(error)) {
      throw error;
    }
    throw new Error("Error interno al conectar con el backend");
  }
}
