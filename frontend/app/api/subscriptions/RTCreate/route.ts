import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { Subscription } from "@/types/Subscription";

const API_URL = process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api/v1";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  try {
    const response = await axios.post<Subscription>(`${API_URL}/subscriptions`, req.body);
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
