#include<iostream>
#include<stdio.h>
#include<algorithm>
#include<math.h>
using namespace std;

int main()
{
    int t,a,b,c,e;
    float d;
    cin>>t;
    while(t--)
    {
              int e=0;
              cin>>a;
              for(b=1;b<=a;b++)
              {
                               c=sqrt(b);
                               d=sqrt(b);
                               if(c==d)e++;
              }
    cout<<e<<endl;
    }
    return 0;
}
