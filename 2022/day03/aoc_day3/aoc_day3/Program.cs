using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aoc_day3
{
    class Program
    {
        static void Main(string[] args)
        {
            string[] lines = System.IO.File.ReadAllLines("input.txt");

            int[] values = new int[52];
            int x = 1;
            string firstHalf = "";
            string secondHalf = "";

            // priorities values
            for (int i = 0; i < 52;i++)
            {
                values[i] = x;
                x++;
            }

            for (int i = 0; i < lines.Length;i++)
            {
                firstHalf = lines[i].Substring(0, lines[i].Length/2);
                secondHalf = lines[i].Substring(lines[i].Length / 2, lines[i].Length / 2);
                for (int j = 0; j < firstHalf.Length;j++)
                {
                    for (int k = 0; k < secondHalf.Length;k++)
                    {
                        if (firstHalf[k] == secondHalf)
                        {

                        }
                    }
                }
            }
        }
    }
}
