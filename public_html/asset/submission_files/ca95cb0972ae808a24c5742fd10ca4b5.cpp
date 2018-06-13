#include <iostream>
using namespace std;
int matrix[10][10];
int checked[10][10];
int fcheck(int i, int j, int n, int m)
{
    if(i >= 0 && j >= 0 && i < n && j < m)
    {
        if(matrix[i][j] == 1 && checked[i][j] == 0) {
            checked[i][j] = 1;
            return 1+fcheck(i-1, j-1, n, m)+
            fcheck(i-1, j, n, m)+
            fcheck(i-1, j+1, n, m)+
            fcheck(i, j-1, n, m)+
            fcheck(i, j+1, n, m)+
            fcheck(i+1, j-1, n, m)+
            fcheck(i+1, j, n, m)+
            fcheck(i+1, j+1, n, m);
        }
    }
    return 0;
}

int main()
{
    int T;
    cin >> T;
    for(int a = 1; a <= T; a++) {
        int n, m;
        cin >> n >> m;
        for(int i = 0; i < n; i++) {
            for(int j = 0; j < m; j++) {
                cin >> matrix[i][j];
            }
        }
        //Test case
        int high = 0;
        for(int i = 0; i < n; i++) {
            for(int j = 0; j < m; j++) {
                if(matrix[i][j] == 1) {
                    int apa = fcheck(i, j, n, m);
                    if(high < apa) {
                        high = apa;
                    }
                }
            }
        }
        cout << high << endl;
    }
    return 0;
}
