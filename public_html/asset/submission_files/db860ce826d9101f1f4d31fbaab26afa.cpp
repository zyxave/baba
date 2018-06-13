#include <iostream>
using namespace std;
int main()
{
    int T;
    cin >> T;
    for(int q = 1; q <= T; q++) {
        int n,d,r;
        cin >> n >> d >> r;
        int a[n];
        for(int i = 0; i < n; i++) {
            cin >> a[i];
        }
        int b[n], lembur = 0;
        for(int i = 0; i < n; i++) {
            cin >> b[i];
            int tahu = (b[i]+a[i])-d;
            if(tahu > 0) lembur += tahu;
        }
        cout << lembur*r << endl;
    }
    return 0;
}
