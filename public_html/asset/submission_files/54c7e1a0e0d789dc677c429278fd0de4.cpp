#include <iostream>
using namespace std;
int matrix[10][10];

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
        for(int i = 0; i < n; i++) {
            for(int j = 0; j < m; j++) {
                if(matrix[i][j] == 1) {
                    if(i+1 < m && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                    if(i+1 < m && j -1 >= 0 && matrix[i+1][j-1] != 0) {
                        if(matrix[i+1][j-1] != -1) matrix[i][j] += 1;
                        matrix[i+1][j-1] = -1;
                    }
                    if(i+1 < m && j+1 < m && matrix[i+1][j+1] != 0) {
                        if(matrix[i+1][j+1] != -1) matrix[i][j] += 1;
                        matrix[i+1][j+1] = -1;
                    }
                    if(j-1 >= 0 && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                    if(i+1 < m && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                    if(i+1 < m && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                    if(i+1 < m && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                    if(i+1 < m && matrix[i+1][j] != 0) {
                        if(matrix[i+1][j] != -1) matrix[i][j] += 1;
                        matrix[i+1][j] = -1;
                    }
                }
            }
        }
        int maxvalue = 0;
        for(int i = 0; i < n; i++) {
            for(int j = 0; j < m; j++) {
                if(maxvalue < matrix[i][j]) {
                    maxvalue = matrix[i][j];
                }
            }
        }
        cout << maxvalue << endl;
    }
    return 0;
}
