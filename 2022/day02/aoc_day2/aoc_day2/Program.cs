using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aoc_day2
{
    internal class Program
    {
        static void Main(string[] args)
        {

            string[] lines = System.IO.File.ReadAllLines("input.txt");

            string strInput = "";
            int total = 0;


            for (int i = 0; i < lines.Length; i++)
            {
                strInput = lines[i];


                // possible outcomes against rock
                if (strInput[0] == 'A' && strInput[2] == 'X')
                {
                    total += 4;    
                }
                if (strInput[0] == 'A' && strInput[2] == 'Y')
                {
                    total += 8;
                }
                if (strInput[0] == 'A' && strInput[2] == 'Z')
                {
                    total += 3;
                }

                // possible outcomes against paper
                if (strInput[0] == 'B' && strInput[2] == 'X')
                {
                    total += 1;
                }
                if (strInput[0] == 'B' && strInput[2] == 'Y')
                {
                    total += 5;
                }
                if (strInput[0] == 'B' && strInput[2] == 'Z')
                {
                    total += 9;
                }

                // possible outcomes against paper
                if (strInput[0] == 'C' && strInput[2] == 'X')
                {
                    total += 7;
                }
                if (strInput[0] == 'C' && strInput[2] == 'Y')
                {
                    total += 2;
                }
                if (strInput[0] == 'C' && strInput[2] == 'Z')
                {
                    total += 6;
                }

            }

            Console.WriteLine(total);
            Console.ReadLine();

        }
    }
}
