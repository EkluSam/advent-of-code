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


            int x = 1;
            string firstHalf;
            string secondHalf;
            List<char> commonLetters= new List<char>();
            string temp = "";
            int counter = 0;
            int test = 0;

            bool founded = false;
            int total = 0;

            // idée faire un petit tableau qui contient un groupe de trois et faire a partir de la en l'updatant a chaque groupe
            // 9iem ligne il y'a un problème il trouve pas la reponse G  à verifier
            for(int i = 0; i < lines.Length; i+=3)
            {
                temp = lines[i];
                for (int j = 0;j < temp.Length; j++)
                {
                    counter = 0;
                    for (int k = 1; k < 3;k++)
                    {
                        for(int q = 0; q < lines[i + k].Length; q++) 
                        {
                            // if letter is found in the next lines
                            if (temp[j] == lines[i + k][q])
                            {
                                
                                counter++;
                                // if letter is found in both next lines
                                if (counter == 2 && k == 2)
                                {
                                    founded = true;
                                    commonLetters.Add(temp[j]);
                                    break;
                                }
                                // if letter is found in the second next line we go to the next letter
                                if (k == 2)
                                {
                                    counter = 0;
                                    break;
                                }
                            }
                            if (counter == 1 && k == 1)
                            {
                                k++;
                                q = -1;
                            }
                        }
                        if (counter == 2 || k == 2)
                        {         
                            counter = 0;
                            break;
                        }
                    }
                    if (counter == 2 || founded)
                    {
                        founded = false;
                        counter = 0;
                        break;
                    }
                }
            }
            // first part
            //for (int i = 0; i < lines.Length;i++)
            //{
            //    firstHalf = lines[i].Substring(0, lines[i].Length/2);
            //    secondHalf = lines[i].Substring(lines[i].Length / 2, lines[i].Length / 2);
            //    for (int j = 0; j < firstHalf.Length; j++)
            //    {
            //        for (int k = 0; k < secondHalf.Length; k++)
            //        {
            //            if(firstHalf[j] == secondHalf[k])
            //            {
            //                commonLetters.Add(secondHalf[k]);
            //                founded = true;
            //            }
            //            if (founded)
            //            {
            //                break;
            //            }
            //        }
            //        if (founded)
            //        {
            //            founded = false;
            //            break;
            //        }
            //    }
            //}

            for(int i = 0; i < commonLetters.Count; i++)
            {
                if (Convert.ToInt32(commonLetters[i]) > 96)
                {
                    total += Convert.ToInt32(commonLetters[i]) - 96;
                }
                else
                {
                    total += Convert.ToInt32(commonLetters[i]) - 38;
                }
            }
            Console.WriteLine(total);
              
            Console.ReadLine();
        }
    }
}
