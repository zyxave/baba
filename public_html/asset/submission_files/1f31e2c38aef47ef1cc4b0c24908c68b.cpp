#include <iostream>
using namespace std;
int main()
{
    int T;
    cin >> T;
    for(int q = 1; q <= T; q++) {
        int p,a,m,r;
        cin >> p >> a >> m >> r;
        int game = 0;
        while(r >= p) {
            r -= p;
            p -= a;
            if(p < m) p = m;
            game++;
        }
        cout << game << endl;
    }
    return 0;
}
