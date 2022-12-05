using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aoc_day4
{
    internal class Program
    {
        static void Main(string[] args)
        {
            string[] lines = System.IO.File.ReadAllLines("input.txt");
            string[] line;
            string[] firstDeer;
            string[] secondDeer;
            int total = 0;
            for(int i = 0; i < lines.Length; i++)
            {
                line = lines[i].Split(',');
                firstDeer = line[0].Split('-');
                secondDeer = line[1].Split('-');
                if (Convert.ToInt32(firstDeer[0]) <= Convert.ToInt32(secondDeer[0]) && Convert.ToInt32(firstDeer[1]) >= Convert.ToInt32(secondDeer[1]))
                {
                    total++;
                }
                else if (Convert.ToInt32(secondDeer[1]) >= Convert.ToInt32(firstDeer[0]) && Convert.ToInt32(secondDeer[1]) <= Convert.ToInt32(firstDeer[1]))
                {
                    total++;
                }
                else if (Convert.ToInt32(secondDeer[0]) >= Convert.ToInt32(firstDeer[0]) && Convert.ToInt32(secondDeer[0]) <= Convert.ToInt32(firstDeer[1]))
                {
                    total++;
                }
                else if (Convert.ToInt32(secondDeer[0]) <= Convert.ToInt32(firstDeer[0]) && Convert.ToInt32(secondDeer[1]) >= Convert.ToInt32(firstDeer[1]))
                {
                    total++;
                }
                
            }

            Console.WriteLine(total);
            Console.ReadLine();
        }
    }
}
