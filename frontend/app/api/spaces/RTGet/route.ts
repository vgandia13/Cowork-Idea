import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { Space } from "@/types/Space";

const API_URL = process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api/v1";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  const { id } = req.query;
  try {
    const response = await axios.get<Space>(`${API_URL}/spaces/${id}`);
    res.status(200).json(response.data);
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
