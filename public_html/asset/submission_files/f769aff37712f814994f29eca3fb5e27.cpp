#include <iostream>

using namespace std;

int main()
{
    int t,p,a,m,r,d,c,i;
    cin >> t;
    for(i = 1;i <= t;i++)
    {
        d=0;
        c=0;
    cin >> p >> a >> m >> r;
    while(c < r)
    {
        if(p >= m)
        {
            c = c + p;
            p = p - a;
        }
        else
        {
           c = c + m;
        }
        d = d + 1;
    }
    if(c == r)
    {
        cout << d;
    }else
    {
        cout << d-1;
    }
    cin.get();
    cin.get();
    }
    return 0;
}
