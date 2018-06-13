#include <bits/stdc++.h>
using namespace std;
unsigned long long CEN;

unsigned long long faktorial (unsigned long long x,unsigned long long y)
{
	if (x==y-1)
	{
		return 1;
	}
	else
	{
		return x*faktorial(x-1,y);
	}
}

unsigned long long kombinasi (unsigned long long p, unsigned long long q)
{
	return faktorial(p,max(q,p-q)+1)/(faktorial(min(q,p-q),1));
}

void ans (unsigned long long p,unsigned long long q,unsigned long long x,unsigned long long y)
{
	if (y==q)
	{
		CEN = kombinasi(q,y)*pow(p,y);
		cout<<CEN<<endl;
	}
	else
	{
		CEN = kombinasi(q,y)*pow(p,y);
		if (CEN!=1)
			printf("%lld",CEN);
		printf("x");
		
		if (x!=1)
			printf("%lld",x);
		printf(" ");
		
		ans (p,q,x-1,y+1); 
	}
}

int main()
{
	int t,tc;
	scanf("%lld",&t);
	for (tc=0; tc<t; tc++)
	{
		unsigned long long p,q;
		scanf("%lld%lld",&p,&q);
		unsigned long long x=q;
		unsigned long long y=0;
		ans (p,q,x,y);
	}
}
