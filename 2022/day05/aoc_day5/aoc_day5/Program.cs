using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aoc_day5
{
    internal class Program
    {
        static void Main(string[] args)
        {
            List<string> lines = new List<string>();


            foreach (string line in System.IO.File.ReadAllLines("input.txt"))
            {
                lines.Add(line);
                Console.WriteLine(line);
            }
            
            

            Console.ReadLine();
        }
    }
}
