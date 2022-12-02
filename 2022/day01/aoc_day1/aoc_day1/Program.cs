using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aoc_day1
{
    internal class Program
    {
        static void Main(string[] args)
        {
            string[] lines = File.ReadAllLines("input.txt");
            List<int> totals = new List<int>();

            int maxTotal = 0;
            int tempMaxTotal = 0;
            for(int i = 0; i < lines.Length; i++)
            {
                if (lines[i] == "")
                {
                    totals.Add(tempMaxTotal);
                    if(tempMaxTotal > maxTotal)
                    {
                        maxTotal = tempMaxTotal;
                    }                   
                    tempMaxTotal = 0;
                    continue;
                }
                tempMaxTotal += Convert.ToInt32(lines[i]);
            }

            totals.Sort();
            Console.WriteLine(maxTotal);
            Console.WriteLine(totals[totals.Count-1] + totals[totals.Count - 2] + totals[totals.Count - 3]);
            Console.ReadLine();


        }
    }
}
