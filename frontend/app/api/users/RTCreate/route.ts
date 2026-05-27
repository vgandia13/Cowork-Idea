import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { User } from "@/types/User";

const API_URL = process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  try {
    const response = await axios.post<User>(`${API_URL}/users`, req.body);
    res.status(201).json(response.data);
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return res.status(error.response?.status || 500).json({
        error: error.response?.data?.message || "Error en la API externa",
      });
    }
    if (error instanceof Error) {
      return res.status(500).json({ error: error.message });
    }
  }
}
