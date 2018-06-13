#include<stdio.h>
#include<string.h>
#include<math.h>
using namespace std;
int main ()
{
	int t;
	scanf("%d",&t);
	for(int x=1;x<=t;x++)
	{
		int n;
		int k;
		scanf("%d %d",&n,&k);
		for(int b=1;;)
		{
			if(n>=10)
			{
				int digit=0;
				int jumlah=0;
				for(int a=1;;a++)
				{
				int tong=n/10;
				if(tong>=1)
					digit++;
					else
					break;
				}
				for(int a=1;a<=digit;a++)
				{
					int m=pow(10,a+1);
					int p=pow(10,a-1);
				int dig=(n%m)/p;
				if(b==1)
				{
				jumlah+=dig*k;
				}
				else
					jumlah+=dig;
				}
				n=jumlah;
				b++;
			}
			else
			break;
		}
		printf("%d",n);
	}
	return 0;
}
