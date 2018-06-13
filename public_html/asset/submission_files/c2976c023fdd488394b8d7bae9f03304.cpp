#include<iostream>
#include<stdio.h>
#include<algorithm>
#include<math.h>
using namespace std;

int main()
{
    int t,a,b,c;
    cin>>t;
    while(t--)
    {
     cin>>a;
     if(a<21)c=a;
     else if(a>=21&&a<31){b=a-21+1;c=b+12;}
     else if(a>=31&&a<41){b=a-31+1;c=b+13;}
     else if(a>=41&&a<51){b=a-41+1;c=b+14;}
     else if(a>=51&&a<61){b=a-51+1;c=b+15;}
     else if(a>=61&&a<71){b=a-61+1;c=b+16;}
     else if(a>=71&&a<81){b=a-71+1;c=b+17;}
     else if(a>=81&&a<91){b=a-81+1;c=b+18;}
     else if(a>=91){b=a-91+1;c=b+19;}
     cout<<c<<endl;
    }

    return 0;
}
