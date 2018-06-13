#include <iostream>
using namespace std;
int main()
{
    int T;
    cin >> T;
    for(int a = 1; a <= T; a++)
    {
        int N;
        cin >> N;
        bool Lampu[N];
        for(int j = 1; j <= N; j++)
        {
            for(int k = j; k <= N ; k += j)
            {
                Lampu[k-1] = !Lampu [k-1];
            }
        }
        int Hitung = 0;
        for(int k = 0; k < N; k ++)
        {
            if(Lampu[k] == true)
            {
                Hitung++;
            }
        }
        cout << Hitung << endl;
    }
    return 0 ;
}
